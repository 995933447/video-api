<?php
namespace App\Services\Auth\ParseValidators;

use App\Services\ParseValidatorContract;
use App\Services\ParseValidatorResult;
use App\User;
use Illuminate\Support\Facades\Validator as BaseValidator;

class SendCodeToFindPasswordByPhone implements ParseValidatorContract
{
    public function validate(array $data): ParseValidatorResult
    {
        $result = BaseValidator::make($data, [
            'app_id' => ['bail', 'required', 'integer'],
            'phone' => [
                'bail',
                'required',
                'regex:/^[1]([3-9])[0-9]{9}$/',
                function ($attribute, $value, $fail) use ($data) {
                    if (!User::where(User::APP_ID_FIELD, $data['app_id'])->where(User::PHONE_FIELD, $value)->exists()) {
                        $fail('您的账户尚未绑定手机');
                    }
                }
            ]
        ],[
            'phone.required' => '手机号码不能为空',
            'phone.regex' => '手机格式不正确',
            'app_id.required' => 'APP ID不合法',
            'app_id.integer' => 'APP ID 不合法'
        ]);

        if ($result->fails()) {
            return ParseValidatorResult::make($result->errors()->toArray());
        }

        return ParseValidatorResult::make();
    }
}