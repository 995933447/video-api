<?php
namespace App;

trait AppTrait
{
    protected static $appId;

    public function setAppId(int $appId)
    {
        static::$appId = $appId;
    }

    public function getAppId()
    {
        return static::$appId;
    }
}