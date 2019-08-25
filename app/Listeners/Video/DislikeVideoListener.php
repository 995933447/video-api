<?php
namespace App\Listeners\Video;

use App\Events\User\UserDislikeVideoEvent;
use App\Tools\Chain\ActionChain;
use Illuminate\Support\Facades\Auth;

class DislikeVideoListener
{
    public function handle(UserDislikeVideoEvent $event)
    {
        (new ActionChain(static::beforeExec($event), static::exec($event)))->do();
    }

    public static function beforeExec()
    {
        return function (UserDislikeVideoEvent $event) {
            return !is_null($event->ip);
        };
    }

    public static function exec(UserDislikeVideoEvent $event)
    {
        return function () use($event) {
            $event->video->dislike_num = $event->video->dislike_num + 1;
            $event->video->save();
        };
    }
}