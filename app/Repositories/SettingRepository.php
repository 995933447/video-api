<?php
namespace App\Repositories;

use App\AdvertPosition;
use App\BottomColumn;
use App\QqGroup;
use App\Services\Redis\Key;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class SettingRepository
{
    public static function getBottom(int $appId): array
    {
        $cacheKey = sprintf(Key::SITE_BOTTOM, $appId);
        $result = Cache::get($cacheKey);
        if (!$result) {
            $bottomColumn = new BottomColumn();
            $bottomColumn->setAppId($appId);
            $result = $bottomColumn->with('bottomList')->where(BottomColumn::STATUS_FIELD, BottomColumn::VALID_STATUS)->get()->toArray();
            Cache::put($cacheKey, $result, Carbon::now()->addHour());
        }
        return $result;
    }

    public static function getQqGroups(): array
    {
        $result = DB::connection('mysql_extend_cnf')->where(QqGroup::STATUS_FILED, QqGroup::VALID_STATUS)->get();
        if (is_null($result)) return [];
        return $result;
    }

    public static function getAdverts(int $appId): array
    {
        $cacheKey = sprintf(Key::ADVERTS, $appId);
        $result = Cache::get($cacheKey);
        if (!$result) {
            $advertPosition = new AdvertPosition();
            $advertPosition->setAppId($appId);
            $result = $advertPosition->with('advert')->where(AdvertPosition::STATUS_FIELD, AdvertPosition::VALID_STATUS)->get()->toArray();
            Cache::put($cacheKey, $result, Carbon::now()->addHour());
        }
        return $result;
    }
}