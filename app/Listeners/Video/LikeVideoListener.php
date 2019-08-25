<?php
namespace App\Listeners\Video;

use App\Events\User\UserLikeVideoEvent;
use App\Tools\Chain\ActionChain;

class LikeVideoListener
{
    public function handle(UserLikeVideoEvent $event)
    {
        (new ActionChain(static::beforeExec($event), static::exec($event)))->do();
    }

    public static function beforeExec(UserLikeVideoEvent $event)
    {
        return function () use ($event) {
            return !is_null($event->ip);
        };
    }

    public static function exec(UserLikeVideoEvent $event)
    {
        return function () use($event) {
            $event->video->like_num = $event->video->like_num + 1;
            $event->video->save();
        };
    }
}