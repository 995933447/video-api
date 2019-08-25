<?php
namespace App\Services\Sms\Tasks\Phone\ResultTransforms;

use App\Services\Sms\Tasks\Phone\ResultTransforms;

interface ResultTransformContract
{
    public static function make(?int $code): Result;
}