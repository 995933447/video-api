<?php
namespace App\Listeners\User;

use App\Events\User\BindPhoneToSmsEvent;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Services\Redis\Key;
use Illuminate\Support\Facades\Auth;

class BindPhoneToSmsListener
{
    public function handle(BindPhoneToSmsEvent $event)
    {
        Cache::put(sprintf(Key::BIND_PHONE_VERIFY_CODE, Auth::id(), $event->phone), $event->code, Carbon::now()->addMinutes(10));
    }
}