<?php
namespace App;

use App\Advert;
use App\CnfBase;
use Illuminate\Database\Eloquent\Model;
use App\AppTrait;

class AdvertPosition extends CnfBase
{
    use AppTrait;

    const PRIMARY_ID_FIELD = 'id';
    const STATUS_FIELD = 'status';

    const VALID_STATUS = 1;

    public function advert()
    {
        return $this->hasMany(Advert::class, Advert::ADVERT_POSITION_ID_FIELD, static::PRIMARY_ID_FIELD)
            ->where(Advert::STATUS_FIELD, Advert::VALID_STATUS)
            ->where(Advert::APP_ID_FIELD, $this->getAppId());
    }
}