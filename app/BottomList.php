<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class BottomList extends Model
{
    public $connection = 'mysql_extend_cnf';

    const PRIMARY_ID_FIELD = 'id';
    const STATUS_FIELD = 'status';
    const COLUMN_ID_FIELD = 'column_id';

    const VALID_STATUS = 1;
}