<?php
namespace App\Services\Auth\Tasks;

use App\Services\Redis\Key;
use App\Services\ServiceCaller;
use App\Services\Sms\Tasks\Phone\Sender;
use App\Services\TaskContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SendCodeToFindPasswordByPhone implements TaskContract
{
    private $phone;
    private $appId;
    private $account;

    public function __construct(string $phone, int $appId, string $account)
    {
        $this->appId = $appId;
        $this->account = $account;
        $this->phone = $phone;
    }

    public function run()
    {
        $code = mt_rand(10000, 99999);
        $text = "【西里西里TV】您正在找回自己的密码，您的手机验证码为:$code";
        Cache::put(sprintf(Key::FIND_PASSWORD_VERIFY_CODE, $this->appId, $this->account), $code, Carbon::now()->addMinutes(10));
        ServiceCaller::call(ServiceCaller::TASK_SERVICE, new Sender(Sender::DEFAULT_DRIVER, $this->phone, $text));
    }
}