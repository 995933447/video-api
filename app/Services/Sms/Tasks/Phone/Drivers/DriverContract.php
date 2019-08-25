<?php
namespace App\Services\Sms\Tasks\Phone\Drivers;

use App\Services\Sms\Tasks\Phone\ResultTransforms\Result;

abstract class DriverContract
{
    protected $phone;
    protected $message;

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
        return $this;
    }

    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }

    abstract public function send(): Result;
}