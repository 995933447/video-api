<?php
namespace App\Services\User\ParseValidators;

use App\Services\ParseValidatorContract;
use App\Services\ParseValidatorResult;
use Illuminate\Support\Facades\Validator as BaseValidator;

class BindPhoneToSms implements ParseValidatorContract
{
    public function validate(array $data): ParseValidatorResult
    {
        $result = BaseValidator::make($data, [
            'phone' => [
                'bail',
                'required',
                'regex:/^(13[0-9]|14[5|7]|15[0|1|2|3|5|6|7|8|9]|18[0|1|2|3|5|6|7|8|9])\d{8}$/',
            ]
        ],[
            'phone.required' => '手机号码必填',
            'phone.regex' => '手机号码格式不正确'
        ]);

        if ($result->fails()) {
            return ParseValidatorResult::make($result->errors()->toArray());
        }

        return ParseValidatorResult::make();
    }
}