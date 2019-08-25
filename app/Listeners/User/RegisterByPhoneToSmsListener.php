<?php
namespace App\Listeners\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use App\Services\Redis\Key;
use App\Events\User\RegisterByPhoneToSmsEvent;

class RegisterByPhoneToSmsListener
{
    public function handle(RegisterByPhoneToSmsEvent $event)
    {
        Cache::put(sprintf(Key::REGISTER_PHONE_VERIFY_CODE, $event->phone), $event->code, Carbon::now()->addMinutes(10));
    }
}