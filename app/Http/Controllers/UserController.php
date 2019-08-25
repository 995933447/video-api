<?php
namespace App\Http\Controllers;

use App\Services\User\ParseValidators\ResetPassword;
use App\Events\User\UserSeeVideoEvent;
use App\Like;
use App\Repositories\UserCollectVideoRecordRepository;
use App\Repositories\UserSeeVideoRecordRepository;
use App\Services\User\ParseValidators\BindPhone;
use App\Services\User\ParseValidators\BindPhoneToSms as BindPhoneToSmsValidator;
use App\Services\ServiceCaller;
use App\Tools\Encryptor\Encryptor;
use App\Tools\Fomatter\End;
use App\Events\User\UserCollectVideoEvent;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;
use App\Events\User\UserLikeVideoEvent;
use App\Events\User\UserDislikeVideoEvent;
use App\Services\User\Tasks\BindPhoneToSms;

class UserController
{
    public function resetPassword(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(ServiceCaller::PARSE_VALIDATOR_SERVICE,ResetPassword::class, $request->all());
        if ($parseValidateResult->errors) {
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);
        }

        $user = Auth::user();
        $user->password = Encryptor::hashPassword($request->input('password'));
        $user->save();

        return End::toSuccessJson();
    }

    public function seeVideo($videoId)
    {
        Event::dispatch(new UserSeeVideoEvent(Video::find($videoId)));
        return End::toSuccessJson();
    }

    public function collectVideo($videoId)
    {
        Event::dispatch(new UserCollectVideoEvent(Video::find($videoId)));
        return End::toSuccessJson();
    }

    public function getSeeVideoRecords()
    {
        return End::toSuccessJson(UserSeeVideoRecordRepository::get());
    }

    public function getCollectVideos()
    {
        return End::toSuccessJson(UserCollectVideoRecordRepository::get());
    }

    public function isLikeVideo($videoId, $status, Request $request)
    {
        $status = (int) $status;

        if ($status === Like::LIKE_TYPE) {
            Event::dispatch(new UserLikeVideoEvent(Video::find($videoId), $request->getClientIp()));
        } else if ($status === Like::DISLIKE_TYPE) {
            Event::dispatch(new UserDislikeVideoEvent(Video::find($videoId), $request->getClientIp()));
        }

        return End::toSuccessJson();
    }

    public function bindPhoneToSms(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(ServiceCaller::PARSE_VALIDATOR_SERVICE, BindPhoneToSmsValidator::class, $request->all());
        if ($parseValidateResult->errors) {
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);
        }

        $smsResult = ServiceCaller::call(ServiceCaller::TASK_SERVICE, new BindPhoneToSms($request->input('phone')));
        if (!$smsResult->ok) {
            return End::toFailureJson(['send_result' => $smsResult->error], End::VALIDATE_ERROR);
        }

        return End::toSuccessJson();
    }

    public function bindPhone(Request $request)
    {
        $parseValidateResult = ServiceCaller::call(ServiceCaller::PARSE_VALIDATOR_SERVICE, BindPhone::class, $request->all());
        if ($parseValidateResult->errors) {
            return End::toFailureJson($parseValidateResult->errors, End::VALIDATE_ERROR);
        }

        $user = Auth::user();
        $user->phone = $request->input('phone');
        $user->save();

        return End::toSuccessJson();
    }
}