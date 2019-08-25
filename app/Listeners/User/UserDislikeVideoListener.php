<?php
namespace App\Listeners\User;

use App\Events\User\UserDislikeVideoEvent;
use App\Tools\Chain\ActionChain;
use App\Like;

class UserDislikeVideoListener
{
    public function handle(UserDislikeVideoEvent $event)
    {
        (new ActionChain(static::beforeExec(), static::exec($event)))->do();
    }

    private static function exec(UserDislikeVideoEvent $event)
    {
        return function () use($event) {
            $userIp = $event->ip;
            $videoId = $event->video->id;
            $old = Like::where(Like::IP_FIELD, $userIp)->where(Like::VIDEO_ID_FIELD, $videoId)->select(Like::TYPE_FIELD)->get();
            if (!$old || (int)$old[0][Like::TYPE_FIELD] === Like::LIKE_TYPE) {
                $new = new Like();
                $new->ip = $userIp;
                $new->video_id = $videoId;
                $new->save();
            }
        };
    }

    private static function beforeExec(UserDislikeVideoEvent $event)
    {
        return function () use ($event) {
            return !is_null($event->ip);
        };
    }
}