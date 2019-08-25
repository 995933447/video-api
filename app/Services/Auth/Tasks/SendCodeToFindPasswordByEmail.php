<?php
namespace App\Services\Auth\Tasks;

use App\Services\TaskContract;
use App\Jobs\EmailJob;
use App\Services\Redis\Key;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Queue;

class SendCodeToFindPasswordByEmail implements TaskContract
{
    private $email;
    private $appId;
    private $account;

    public function __construct(string $email, int $appId, string $account)
    {
        $this->appId = $appId;
        $this->account = $account;
        $this->email = $email;
    }


    public function run()
    {
        $code = mt_rand(10000, 99999);
        $text = "来自西里西里TV:您正在找回自己的密码，您的邮箱验证码为$code";

        Cache::put(sprintf(Key::FIND_PASSWORD_VERIFY_CODE, $this->appId, $this->account), $code, Carbon::now()->addMinutes(10));
        Queue::push(new EmailJob($text, $this->email, '找回密码'));
    }

}