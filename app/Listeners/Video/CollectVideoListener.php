<?php
namespace App\Listeners\Video;

use App\Events\User\UserCollectVideoEvent;
use App\Tools\Chain\ActionChain;
use Illuminate\Support\Facades\Auth;
use App\UserCollectVideo;

class CollectVideoListener
{
    public function handle(UserCollectVideoEvent $event)
    {
        (new ActionChain(static::beforeExec($event), static::exec($event)))->do();
    }

    public static function beforeExec(UserCollectVideoEvent $event)
    {
        return function () use ($event) {
            return Auth::check() && !UserCollectVideo::where(UserCollectVideo::USER_ID_FIELD, Auth::id())->where(UserCollectVideo::VIDEO_ID_FIELD, $event->video->id)->count();
        };
    }

    public static function exec(UserCollectVideoEvent $event)
    {
        return function () use($event) {
            $event->video->real_collect_num = $event->video->real_collect_num + 1;
            $event->video->collect_num = $event->video->collect_num + 1;
            $event->video->save();
        };
    }
}