<?php
namespace App\Services\Auth\Tasks;

use App\Tools\Encryptor\Encryptor;
use App\User;
use App\Services\TaskContract;

class ResetPasswordToFindPassword implements TaskContract
{
    private $appId;
    private $account;
    private $password;

    public function __construct(int $appId, string $account, string $password)
    {
        $this->account = $account;
        $this->password = $password;
        $this->appId = $appId;
    }

    public function run()
    {
        User::where(User::APP_ID_FIELD, $this->appId)
            ->where(function ($query) {
               $query->where(User::EMAIL_FIELD, $this->account)->orWhere(User::PHONE_FIELD, $this->account);
            })
            ->update([User::PASSWORD_FIELD => Encryptor::hashPassword($this->password)]);
    }
}