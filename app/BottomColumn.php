<?php
namespace App;

use App\BottomList;
use Illuminate\Database\Eloquent\Model;
use App\CnfBase;
use App\AppTrait;

class BottomColumn extends CnfBase
{
    use AppTrait;

    const STATUS_FIELD = 'status';
    const PRIMARY_ID_FIELD = 'id';

    const VALID_STATUS = 1;

    public function bottomList()
    {
        return $this->hasMany(BottomList::class, BottomList::COLUMN_ID_FIELD, static::PRIMARY_ID_FIELD)
            ->where(BottomList::STATUS_FIELD, BottomList::VALID_STATUS)
            ->where(BottomList::APP_ID_FIELD, $this->getAppId());
    }
}