<?php
namespace App\Listeners\User;

use App\Events\User\UserSeeVideoEvent;
use App\Repositories\UserSeeVideoRecordRepository;
use App\Tools\Chain\ActionChain;
use Illuminate\Support\Facades\Auth;
use App\UserSeeVideoRecord;

class RecordUserSeeVideoListener
{
    public function handle(UserSeeVideoEvent $event)
    {
        (new ActionChain(static::beforeExec(), static::exec($event)))->do();
    }

    private static function exec(UserSeeVideoEvent $event)
    {
        return function () use($event) {
            $userId = Auth::id();

            if (!UserSeeVideoRecord::where(UserSeeVideoRecord::USER_ID_FIELD, $userId)
                    ->where(UserSeeVideoRecord::VIDEO_ID_FIELD, $event->video->id)
                    ->whereBetween(UserSeeVideoRecord::CREATED_AT_FIELD, [date('Y-m-d 00:00:00'), date('Y-m-d 00:00:00',strtotime('+1 day'))])
                    ->count())

                UserSeeVideoRecordRepository::create($event->video);

            else

                UserSeeVideoRecord::where(UserSeeVideoRecord::USER_ID_FIELD, $userId)
                    ->where(UserSeeVideoRecord::VIDEO_ID_FIELD, $event->video->id)
                    ->whereBetween(UserSeeVideoRecord::CREATED_AT_FIELD, [date('Y-m-d 00:00:00'), date('Y-m-d 00:00:00',strtotime('+1 day'))])
                    ->update([UserSeeVideoRecord::CREATED_AT_FIELD => date('Y-m-d H:i:s')]);
        };
    }

    private static function beforeExec()
    {
        return function () {
            return Auth::check();
        };
    }
}