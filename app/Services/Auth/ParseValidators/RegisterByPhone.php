<?php
namespace App\Services\Auth\ParseValidators;

use App\Services\ParseValidatorContract;
use App\Services\ParseValidatorResult;
use App\Services\Redis\Key;
use App\User;
use Illuminate\Support\Facades\Validator as BaseValidator;
use Illuminate\Support\Facades\Cache;

class RegisterByPhone implements ParseValidatorContract
{
    public function validate(array $data): ParseValidatorResult
    {
        $result = BaseValidator::make($data, [
            'nickname' => [
                'bail',
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($data) {
                    if (!isset($data['app_id'])) {
                        $fail('APP ID不合法');
                    } else if (User::where(User::NICKNAME_FIELD, $value)->where(User::APP_ID_FIELD, $data['app_id'])->exists()) {
                        $fail('用户名已存在');
                    }
                },
            ],
            'phone' => [
                'bail',
                'required',
                'string',
                'regex:/^[1]([3-9])[0-9]{9}$/',
                function ($attribute, $value, $fail) use ($data) {
                    if (!isset($data['app_id'])) {
                        $fail('APP ID不合法');
                    } else if (User::where(User::PHONE_FIELD, $value)->where(User::APP_ID_FIELD, $data['app_id'])->exists()) {
                        $fail('手机号码已存在');
                    }
                }
            ],
            'code' => [
              'bail',
              'required',
              function ($attribute, $value, $fail) use ($data) {
                 if ($correctCode = $this->getValidateCode($data['phone'])) {
                     if ($correctCode != $value) {
                         $fail('验证码不正确');
                     }
                 } else {
                     $fail('验证码已过期');
                 }
              }
            ],
            'password' => ['bail', 'required', 'string', 'min:8', 'confirmed'],
            'sex' => ['bail', sprintf('in:%d,%d,%d', User::MAN_SEX, User::WOMEN_SEX, User::UNKNoW_SEX)],
            'app_id' => ['bail', 'required', 'integer']
        ],[
            'nickname.required' => '请输入您的用户名',
            'nickname.max' => '用户名长度不能超过225个字符',
            'nickname.string' => '用户名不合法',
            'phone.required' => '手机号码不能为空',
            'phone.regex' => '手机格式不正确',
            'sex.in' => '性别不合法',
            'app_id.required' => '缺少APP ID',
            'app_id.integer' => 'APP ID不合法',
            'password.required' => '密码不能为空',
            'password.min' => '密码不能少于8个字',
            'password.confirmed' => '两次密码输入不正确',
        ]);

        if ($result->fails()) {
            return ParseValidatorResult::make($result->errors()->toArray());
        }

        return ParseValidatorResult::make([]);
    }

    public function getValidateCode(string $phone): string
    {
        return Cache::get(sprintf(Key::REGISTER_PHONE_VERIFY_CODE, $phone));
    }

}