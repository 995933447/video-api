<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSeeVideoRecord extends Model
{
    const VIDEO_ID_FIELD = 'video_id';
    const USER_ID_FIELD = 'user_id';
    const CREATED_AT_FIELD = 'created_at';
    const UPDATED_AT_FIELD = 'updated_at';

    public function video(){
        return $this->hasMany(Video::class, Video::PRIMARY_ID_FIELD, self::VIDEO_ID_FIELD)
                ->where(Video::STATUS_FIELD, Video::VALID_STATUS);
    }
}