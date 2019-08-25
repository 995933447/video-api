<?php
namespace App\Services\Sms\Tasks\Phone;

use App\Services\Redis\Key;
use App\Services\Sms\Tasks\Phone\Drivers\Smsbao;
use App\Services\Sms\Tasks\Phone\Drivers\Smschinese;
use App\Services\Sms\Tasks\Phone\ResultTransforms\Result;
use App\Services\TaskContract;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class Sender implements TaskContract
{
    const DEFAULT_DRIVER = 'smsbao';

    const SMSCHINESE_DRIVER = 'smschinese';
    const SMSBAO_DRIVER = 'smsbao';

    private $drivers = [];

    private $driver;

    private $phone;

    private $message;

    private $limitRateResult;

    public function __construct(string $driver, string $phone, string $message)
    {
        $this->drivers = [
            self::SMSCHINESE_DRIVER => Smschinese::class,
            self::SMSBAO_DRIVER => Smsbao::class,
        ];

        $this->limitRateResult = new Result(false, '手机验证码请求过于频繁');

        $this->phone = $phone;
        $this->message = $message;
        $this->driver = new $this->drivers[$driver];
    }

    public function run()
    {
        if ($this->checkLimitRate()) {
            return $this->limitRateResult;
        }

        $result = $this->driver->setPhone($this->phone)->setMessage($this->message)->send();

        if ($result->ok) {
            $this->recordRate();
        }

        return $result;
    }

    public function checkLimitRate()
    {
        return Cache::has(sprintf(Key::PHONE_LAST_REQUEST_SMS_TIME, $this->phone));
    }

    public function recordRate()
    {
        return Cache::put(sprintf(Key::PHONE_LAST_REQUEST_SMS_TIME, $this->phone), time(), Carbon::now()->addMinute());
    }
}