<?php
namespace App\Services\Sms\Tasks\Phone\ResultTransforms;

use App\Services\Sms\Tasks\Phone\ResultTransforms\ResultTransformContract;

class Smschinese implements ResultTransformContract
{
    protected static $errors = [
        -4 => '手机号码不正确'
    ];

    public static function make(?int $code): Result
    {
        if (is_null($code)) {
            return new Result(false, '未知错误');
        }

        if ($code < 0) {
            if (isset(self::$errors[$code])) {
                return new Result(false, self::$errors[$code]);
            }
            return new Result(false, "服务器内部错误");
        }

        return new Result(true, null);
    }
}