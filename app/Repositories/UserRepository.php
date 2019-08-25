<?php
namespace App\Repositories;

use App\Tools\Encryptor\Encryptor;
use App\User;

class UserRepository
{
    public static function create(array $data): bool
    {
        $model = new User();
        if (isset($data['sex'])) $model->sex = $data['sex'];
        if (isset($data['phone'])) $model->phone = $data['phone'];
        if (isset($data['email'])) $model->email = $data['email'];
        $model->nickname = $data['nickname'];
        $model->password = Encryptor::hashPassword($data['password']);
        $model->app_id = $data['app_id'];
        return $model->save();
    }
}