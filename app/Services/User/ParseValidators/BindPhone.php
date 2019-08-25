<?php
namespace App\Services\User\ParseValidators;

use App\Services\ParseValidatorContract;
use App\Services\ParseValidatorResult;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator as BaseValidator;
use App\Services\Redis\Key;
use Illuminate\Support\Facades\Auth;

class BindPhone implements ParseValidatorContract
{
    public function validate(array $data): ParseValidatorResult
    {
        $result = BaseValidator::make($data, [
           'phone' => [
               'bail',
               'required'
            ],
           'code' => [
               'bail',
               'required',
               function ($attribute, $value, $fail) use ($data) {
                   $correctCode = $this->getValidateCode($data['phone']);
                    if (!$correctCode) {
                        $fail('验证码已过期');
                    } else {
                        if ($correctCode != $value) {
                            $fail('验证码不正确');
                        }
                    }
               }
           ]
        ]);

        if ($result->fails()) {
            return ParseValidatorResult::make($result->errors()->toArray());
        }

        return ParseValidatorResult::make();
    }

    public function getValidateCode(string $phone)
    {
        return Cache::get(sprintf(Key::BIND_PHONE_VERIFY_CODE, Auth::id(), $phone));
    }
}