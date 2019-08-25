<?php
namespace App\Services\Redis;

class Key
{
    const USER_LOGIN_TOKEN = 'user:%d_token';
    const FIND_PASSWORD_VERIFY_CODE = 'app:%d_user:%s_find_password_verify_code';
    const BIND_PHONE_VERIFY_CODE ='user:%d_phone:%s_verify_code';
    const REGISTER_PHONE_VERIFY_CODE = 'phone:%s_verify_code';
    const PHONE_LAST_REQUEST_SMS_TIME = 'phone:%s';
    const SITE_BOTTOM = 'site_bottom';
}