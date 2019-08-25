<?php

namespace App\Providers;

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\ExampleEvent' => [
            'App\Listeners\ExampleListener',
        ],
        //捕抓sql日志
        'Illuminate\Database\Events\QueryExecuted' => [
            'App\Listeners\QueryListener'
        ],
        //监听视频被观看动作
        'App\Events\User\UserSeeVideoEvent' => [
            'App\Listeners\Video\RecordVideoSeeNumListener',
            'App\Listeners\User\RecordUserSeeVideoListener'
        ],
        //监听用户收藏视频动作
        'App\Events\User\UserCollectVideoEvent' => [
            'App\Listeners\Video\CollectVideoListener',
            'App\Listeners\User\UserCollectVideoListener'
        ],
        //监听用户点赞动作
        'App\Events\User\UserLikeVideoEvent' => [
            'App\Listeners\Video\LikeVideoListener',
            'App\Listeners\User\UserLikeVideoListener'
        ],
        //监听用户点踩
        'App\Events\User\UserDislikeVideoEvent' => [
            'App\Listeners\Video\DislikeVideoListener',
            'App\Listeners\User\UserDislikeVideoListener'
        ],
        //监听用户绑定手机发送短信事件
        'App\Events\User\BindPhoneToSmsEvent' => [
            'App\Listeners\User\BindPhoneToSmsListener'
        ],
        //监听用户绑定手机发送短信事件
        'App\Events\User\RegisterByPhoneToSmsEvent' => [
            'App\Listeners\User\RegisterByPhoneToSmsListener'
        ]
    ];
}
