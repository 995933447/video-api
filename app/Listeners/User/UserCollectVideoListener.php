<?php
namespace App\Listeners\User;

use App\Events\User\UserCollectVideoEvent;
use App\Repositories\UserCollectVideoRecordRepository;
use App\Tools\Chain\ActionChain;
use App\UserCollectVideo;
use Illuminate\Support\Facades\Auth;

class UserCollectVideoListener
{
    public function handle(UserCollectVideoEvent $event)
    {
        (new ActionChain(static::beforeExec($event), static::exec($event)))->do();
    }

    private static function exec(UserCollectVideoEvent $event)
    {
        return function () use($event) {
            UserCollectVideoRecordRepository::create($event->video);
        };
    }


    private static function beforeExec(UserCollectVideoEvent $event)
    {
        return function () use ($event) {
            return Auth::check() && !UserCollectVideo::where(UserCollectVideo::USER_ID_FIELD, Auth::id())->where(UserCollectVideo::VIDEO_ID_FIELD, $event->video->id)->count();
        };
    }
}