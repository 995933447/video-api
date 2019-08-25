<?php
namespace App\Services\Auth\Tasks;

use App\Events\User\RegisterByPhoneToSmsEvent;
use App\Services\ServiceCaller;
use App\Services\Sms\Tasks\Phone\Sender;
use App\Services\TaskContract;
use Illuminate\Support\Facades\Event;

class RegisterByPhoneToSms implements TaskContract
{
    private $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function run()
    {
        $code = mt_rand(10000, 99999);
        $message = sprintf("【%s】请输入您的验证码完成注册,验证码:%d", "西里西里TV", $code);
        $smsResult = ServiceCaller::call(ServiceCaller::TASK_SERVICE, new Sender(Sender::DEFAULT_DRIVER, $this->phone, $message));
        if ($smsResult->ok) {
            Event::dispatch(new RegisterByPhoneToSmsEvent($this->phone, $code));
        }
        return $smsResult;
    }
}