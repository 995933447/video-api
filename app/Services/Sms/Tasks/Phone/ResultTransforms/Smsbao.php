<?php
namespace App\Services\Sms\Tasks\Phone\ResultTransforms;

use App\Services\Sms\Tasks\Phone\ResultTransforms\Result;

class Smsbao implements ResultTransformContract
{
    private static $errors = array(
        0 => "短信发送成功",
        -1 => "参数不全",
        -2 => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
        30 => "密码错误",
        40 => "账号不存在",
        41 => "余额不足",
        42 => "帐户已过期",
        43 => "IP地址限制",
        50 => "内容含有敏感词"
    );

    public static function make(?int $code): Result
    {
        if ($code == 0)
            return new Result(true, null);
        else
            return new Result(false, static::$errors[$code]);
    }
}