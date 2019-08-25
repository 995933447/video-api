<?php
namespace App\Http\Controllers\Auth;

use App\Services\Auth\ParseValidators\ResetPasswordToFindPassword as ResetPasswordValidator;
use App\Services\Auth\Tasks\ResetPasswordToFindPassword;
use App\Tools\Fomatter\End;
use Illuminate\Http\Request;
use App\Services\Auth\ParseValidators\SendCodeToFindPasswordByEmail as SendCodeToFindPasswordByEmailValidator;
use App\Services\Auth\Tasks\SendCodeToFindPasswordByEmail;
use App\Services\ServiceCaller;
use App\Services\Auth\ParseValidators\SendCodeToFindPasswordByPhone as SendCodeToFindPasswordByPhoneValidator;
use App\Services\Auth\Tasks\SendCodeToFindPasswordByPhone;

class ForgetController
{
    public function sendVerifyCodeByEmail(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(
            ServiceCaller::PARSE_VALIDATOR_SERVICE,
            SendCodeToFindPasswordByEmailValidator::class,
            $request->all()
        );
        if ($parseValidateResult->errors) {
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);
        }

        ServiceCaller::call(
            ServiceCaller::TASK_SERVICE,
            new SendCodeToFindPasswordByEmail($request->input('email'), (int)$request->input('app_id'), $request->input('email'))
        );

        return End::toSuccessJson();
    }

    public function sendVerifyCodeByPhone(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(
            ServiceCaller::PARSE_VALIDATOR_SERVICE,
            SendCodeToFindPasswordByPhoneValidator::class,
            $request->all()
        );
        if ($parseValidateResult->errors) {
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);
        }

        ServiceCaller::call(
            ServiceCaller::TASK_SERVICE,
            new SendCodeToFindPasswordByPhone($request->input('phone'), (int)$request->input('app_id'), $request->input('phone'))
         );

        return End::toSuccessJson();
    }

    public function resetPassword(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(ServiceCaller::PARSE_VALIDATOR_SERVICE,ResetPasswordValidator::class, $request->all());
        if ($parseValidateResult->errors) {
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);
        }

        ServiceCaller::call(
            ServiceCaller::TASK_SERVICE,
            new ResetPasswordToFindPassword($request->input('app_id'), $request->input('email')?:$request->input('phone'), $request->input('password'))
        );

        return End::toSuccessJson();
    }
}