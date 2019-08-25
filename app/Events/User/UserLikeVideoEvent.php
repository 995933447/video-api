<?php
namespace App\Events\User;

use App\Events\Event;
use App\Video;

class UserLikeVideoEvent extends Event
{
    public $video;

    public $ip;

    public function __construct(Video $video, ?string $ip)
    {
        $this->video = $video;
        $this->ip = $ip;
    }
}