<?php
namespace App\Services\Sms\Tasks\Phone\Drivers;

use App\Services\Sms\Tasks\Phone\ResultTransforms\Result;

class Smsbao extends DriverContract
{
    public function Send(): Result
    {
        $api = sprintf(
            "http://api.smsbao.com/sms?u=%s&p=%s&m=%s&c=%s",
            config("sms.phone.smsbao.uid"),
            md5(config("sms.phone.smsbao.password")),
            $this->phone,
            urlencode($this->message)
        );
        return \App\Services\Sms\Tasks\Phone\ResultTransforms\Smsbao::make((int)file_get_contents($api));
    }
}