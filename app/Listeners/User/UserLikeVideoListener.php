<?php
namespace App\Listeners\User;

use App\Events\User\UserLikeVideoEvent;
use App\Like;
use App\Tools\Chain\ActionChain;

class UserLikeVideoListener
{
    public function handle(UserLikeVideoEvent $event)
    {
        (new ActionChain(static::beforeExec($event), static::exec($event)))->do();
    }

    private static function exec(UserLikeVideoEvent $event)
    {
        return function () use($event) {
           $userIp = $event->ip;
           $videoId = $event->video->id;
           $old = Like::where(Like::IP_FIELD, $userIp)->where(Like::VIDEO_ID_FIELD, $videoId)->select(Like::TYPE_FIELD)->get();
           if (!$old || (int)$old[0][Like::TYPE_FIELD] === Like::DISLIKE_TYPE) {
               $new = new Like();
               $new->ip = $userIp;
               $new->video_id = $videoId;
               $new->save();
           }
        };
    }

    private static function beforeExec(UserLikeVideoEvent $event)
    {
        return function () use ($event) {
            return !is_null($event->ip);
        };
    }
}