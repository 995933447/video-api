<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Scout\Searchable;

class Video extends Model
{
    use BaseTrait;
    use Searchable;

    const STATUS_FIELD = 'status';
    const TAG_IDS_FIELD = 'tag_ids';
    const SEE_NUM_FIELD = 'see_num';
    const CATEGORY_ID_FIELD = 'category_id';
    const SUBJECT_ID_FIELD = 'subject_id';
    const PRIMARY_ID_FIELD = 'id';
    const NAME_FIELD = 'name';
    const LONG_TYPE_FIELD = 'long_type';
    const M3U8_FIELD = 'm3u8';
    const ORIGINAL_M3U8_FILED = 'original_m3u8';
    const MP4_FIELD = 'mp4';
    const ORIGINAL_MP4_FIELD = 'original_mp4';
    const NEED_LOGIN_FIELD = 'need_login';
    const CRAWLER_URL_FIELD = 'crawler_url';

    const VALID_STATUS = 1;

    const SHORT_LONG_TYPE = 0;
    const MIDDLE_LONG_TYPE = 1;
    const LONG_LONG_TYPE = 2;

    const NEED_LOGIN_TYPE = 1;
    const NEED_NOT_LOGIN_TYPE = 0;

    // 隐藏可直接播放视频相关字段
    protected $hidden = [
        self::M3U8_FIELD,
        self::ORIGINAL_M3U8_FILED,
        self::MP4_FIELD,
        self::ORIGINAL_MP4_FIELD,
        self::CRAWLER_URL_FIELD,
    ];

    /**
     * 索引的字段
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return $this->only($this->primaryKey, self::NAME_FIELD, self::TAG_IDS_FIELD);
    }

}