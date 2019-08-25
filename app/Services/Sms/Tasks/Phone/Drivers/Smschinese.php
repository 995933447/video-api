<?php
namespace App\Services\Sms\Tasks\Phone\Drivers;

use App\Services\Sms\Tasks\Phone\Drivers\DriverContract;
use App\Services\Sms\Tasks\Phone\ResultTransforms\Result;

class Smschinese extends DriverContract
{
    public function send(): Result
    {
        $api = sprintf(
            "http://utf8.api.smschinese.cn/?Uid=%s&Key=%s&smsMob=%s&smsText=%s",
            config("sms.phone.smschinese.uid"),
            config("sms.phone.smschinese.key"),
            $this->phone,
            $this->message
        );
        return \App\Services\Sms\Tasks\Phone\ResultTransforms\Smschinese::make((int)file_get_contents($api));
    }
}