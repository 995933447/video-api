<?php
namespace App\Services\Auth\ParseValidators;

use App\Services\ParseValidatorContract;
use App\Services\ParseValidatorResult;
use App\User;
use Illuminate\Support\Facades\Validator as BaseValidator;

class RegisterByPhoneToSms implements ParseValidatorContract
{
    public function validate(array $data): ParseValidatorResult
    {
        $result = BaseValidator::make($data, [
            'app_id' => ['bail', 'required'],
            'phone' => [
                'bail',
                'required',
                'string',
                'regex:/^[1]([3-9])[0-9]{9}$/',
                function ($attribute, $value, $fail) use ($data) {
                    if (!isset($data['app_id'])) {
                        $fail('APP ID 不合法');
                    } else if (User::where(User::PHONE_FIELD, $value)->where(User::APP_ID_FIELD, $data['app_id'])->exists()) {
                        $fail('手机号码已存在');
                    }
                }
            ],
        ],[
            'app_id.required' => 'APP ID 不合法',
            'phone.required' => '手机号码不能为空',
            'phone.regex' => '手机格式不正确',
        ]);

        if ($result->fails()) {
            return ParseValidatorResult::make($result->errors()->toArray());
        }

        return ParseValidatorResult::make([]);
    }
}