<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    const LIKE_TYPE = 1;
    const DISLIKE_TYPE = 0;

    const VIDEO_ID_FIELD = 'video_id';
    const IP_FIELD = 'ip';
    const TYPE_FIELD = 'type';
}