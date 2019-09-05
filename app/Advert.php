<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CnfBase;

class Advert extends CnfBase
{
    const ADVERT_POSITION_ID_FIELD = 'advert_position_id';
    const STATUS_FIELD = 'status';
    const APP_ID_FIELD = 'app_id';

    const VALID_STATUS = 1;
}