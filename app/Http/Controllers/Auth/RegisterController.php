<?php
namespace App\Http\Controllers\Auth;

use App\Services\Auth\ParseValidators\RegisterByPhone;
use App\Services\Auth\Tasks\RegisterByPhoneToSms;
use Illuminate\Http\Request;
use App\Tools\Fomatter\End;
use App\Repositories\UserRepository as Repository;
use App\Services\Auth\ParseValidators\RegisterByEmail;
use App\Services\ServiceCaller;
use App\Services\Auth\ParseValidators\RegisterByPhoneToSms as RegisterByPhoneToSmsValidator;

class RegisterController
{
    public function byEmail(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(ServiceCaller::PARSE_VALIDATOR_SERVICE, RegisterByEmail::class, $request->all());

        if (!is_null($parseValidateResult->errors))
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);

        if (!Repository::create($request->all()))
            return End::toFailureJson([], End::INTERNAL_ERROR);

        return End::toSuccessJson();
    }

    public function byPhoneToSms(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(ServiceCaller::PARSE_VALIDATOR_SERVICE, RegisterByPhoneToSmsValidator::class, $request->all());

        if (!is_null($parseValidateResult->errors))
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);

        $smsResult = ServiceCaller::call(ServiceCaller::TASK_SERVICE, new RegisterByPhoneToSms($request->input('phone')));
        if (!$smsResult->ok)
            return End::toFailureJson(['send_result' => $smsResult->error], End::VALIDATE_ERROR);

        return End::toSuccessJson();
    }

    public function byPhone(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(ServiceCaller::PARSE_VALIDATOR_SERVICE, RegisterByPhone::class, $request->all());

        if (!is_null($parseValidateResult->errors))
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);

        if (!Repository::create($request->all()))
            return End::toFailureJson([], End::INTERNAL_ERROR);

        return End::toSuccessJson();
    }
}