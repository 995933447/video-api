<?php
namespace App\Repositories;

use App\BottomColumn;
use App\Services\Redis\Key;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class SettingRepository
{
    public static function getBottom(): array
    {
        $result = Cache::get(Key::SITE_BOTTOM);
        if (!$result) {
            $result = BottomColumn::with('bottomList')->where(BottomColumn::STATUS_FIELD, BottomColumn::VALID_STATUS)->get()->toArray();
            Cache::put(Key::SITE_BOTTOM, $result, Carbon::now()->addHour());
        }
        return $result;
    }
}