<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\CnfBase;

class BottomList extends CnfBase
{
    const PRIMARY_ID_FIELD = 'id';
    const STATUS_FIELD = 'status';
    const COLUMN_ID_FIELD = 'column_id';
    const APP_ID_FIELD = 'app_id';

    const VALID_STATUS = 1;
}