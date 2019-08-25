<?php
namespace App\Listeners\Video;

use App\Events\User\UserSeeVideoEvent;
use App\Category;

class RecordVideoSeeNumListener
{
    public function handle(UserSeeVideoEvent $event)
    {
       $event->video->see_num = $event->video->see_num + 1;
       $event->video->real_see_num = $event->video->real_see_num + 1;
       $event->video->save();
       Category::where(Category::PRIMARY_ID_FIELD, $event->video->category_id)->increment(Category::PLAY_NUM_FIELD, 1);
    }
}