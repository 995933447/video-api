<?php
namespace App\Events\User;

use App\Events\Event;

class BindPhoneToSmsEvent extends Event
{
    public $code;

    public $phone;

    public function __construct(string $phone, string $code)
    {
        $this->code = $code;
        $this->phone = $phone;
    }
}