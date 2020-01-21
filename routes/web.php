<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Repositories\CategoryRepository;
use App\Repositories\VideoRepository;
use App\Repositories\TagRepository;
use App\Repositories\SubjectRepository;
use App\Tools\Fomatter\End;
use Illuminate\Support\Facades\Auth;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/**
 * @api {get} /categories/app/:appId 获取分类信息
 * @apiGroup Gateway
 * @apiName 获取分类信息
 * @apiParam {Number} appId 应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用分类（后台可配置应用拥有哪些分类）,不传则获取所有视频分类
 * @apiParamExample 请求样例
 * /categories/app
 * @apiSuccess (Success) {number} status 状态码
 * @apiSuccess (Success) {string} msg  消息
 * @apiSuccess (Success) {object} data 数据
 * @apiSuccess (Success) {number} data.id 数据id
 * @apiSuccess (Success) {string} data.created_at 创建时间
 * @apiSuccess (Success) {string} data.updated_at 更新时间
 * @apiSuccess (Success) {string} data.name 名称
 * @apiSuccess (Success) {string} data.icon 图标
 * @apiSuccess (Success) {number} data.status 状态码,忽略
 * @apiSuccess (Success) {string} data.remark 备注
 * @apiSuccess (Success) {string} data.description 描述
 * @apiSuccess (Success) {number} data.video_num 视频数量
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *           {
 *               "id": 476,
 *               "created_at": "2019-07-15 07:33:58",
 *               "updated_at": "2019-07-15 07:33:58",
 *               "name": "服裝",
 *               "icon": "",
 *               "sort": 0,
 *               "status": 1,
 *               "remark": null,
 *               "description": null,
 *               "video_num": 615
 *           },
 *           {
 *               "id": 477,
 *               "created_at": "2019-07-15 07:33:58",
 *               "updated_at": "2019-07-15 07:33:58",
 *               "name": "台湾",
 *               "icon": "",
 *               "sort": 0,
 *               "status": 1,
 *               "remark": null,
 *               "description": null,
 *               "video_num": 615
 *           },
 *        ],
 *        "msg": "请求成功"
 *     }
 */
$router->get('/categories/app[/{appId:[0-9]+}]', function ($appId = null) {
    if (is_null($appId))
        return End::toSuccessJson(CategoryRepository::get());
    else
        return End::toSuccessJson(CategoryRepository::getByApp($appId));
});

/**
 * @api {get} /categories/videos 获取指定分类下的视频（Getting category video）
 * @apiName 获取指定分类下的视频（Getting category video）
 * @apiGroup Video
 *
 * @apiParam {Array} category_ids 分类ID,可选。传则代表获取指定分类下的视频(以数组形式.数组有多个元素则代表多个分类),不传代表获取全部分类下的视频
 * @apiParam {Array} long_types 长度类型,可选。传则代表获取指定长度类型下的视频(以数组形式.数组有多个元素则代表多个获取长度类型.0.短视频(小于25分钟)，1.中长视频(小于60分钟)，2.长视频(大于60分钟)),不穿代表获取所有长度类型的视频
 * @apiParam {Array} page 分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据
 * @apiParam {String} order 排序，可选。不传代表随机排序。可选项:"see_num desc"代表根据观看次数降序排序,"see_num asc"代表根据观看次数升序排序,"collect_num desc"根据收藏次数降序排序,"collect_num asc"根据收藏次数升序排序,"created_at desc"根据上传时间排序降序排序,"created_at asc"根据上传时间升序排序
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 * @apiSuccess (Success) {Number} data.id 数据id
 * @apiSuccess (Success) {String} data.created_at 创建时间
 * @apiSuccess (Success) {String} data.updated_at 更新时间
 * @apiSuccess (Success) {String} data.name 名称
 * @apiSuccess (Success) {String} data.icon 图标
 * @apiSuccess (Success) {Number} data.status 状态码,忽略
 * @apiSuccess (Success) {String} data.remark 备注
 * @apiSuccess (Success) {String} data.description 描述
 * @apiSuccess (Success) {Number} data.video_num 视频数量
 * @apiSuccess (Success) {Object} data.video 数据集合
 * @apiSuccess (Success) {Number} data.video.id 视频Id
 * @apiSuccess (Success) {String} data.video.name 视频名称
 * @apiSuccess (Success) {String} data.video.icon 视频图标,忽略
 * @apiSuccess (Success) {Number} data.video.category_id 分类ID
 * @apiSuccess (Success) {Number} data.video.subject_id 主题id
 * @apiSuccess (Success) {String} data.video.mainimg 主图地址
 * @apiSuccess (Success) {String} data.video.crawler_url 忽略
 * @apiSuccess (Success) {String} data.video.original_m3u8 忽略
 * @apiSuccess (Success) {String} data.video.m3u8 m3u8文件位置
 * @apiSuccess (Success) {String} data.video.original_mp4 忽略
 * @apiSuccess (Success) {String} data.video.mp4 忽略
 * @apiSuccess (Success) {Number} data.video.long 视频时长,秒数
 * @apiSuccess (Success) {Number} data.video.see_num 视频观看次数,不一定真实(供展现使用)
 * @apiSuccess (Success) {String} data.video.tag_ids 视频标签ID
 * @apiSuccess (Success) {Number} data.video.need_charge 是否需要充值,忽略.1需要，0不需要
 * @apiSuccess (Success) {Number} data.video.real_see_num 真实观看次数,忽略
 * @apiSuccess (Success) {Number} data.video.collect_num 收藏次数，不一定真实(供展现使用)
 * @apiSuccess (Success) {Number} real_collect_num 真实收藏次数，忽略
 * @apiSuccess (Success) {Number} data.video.status 状态,1有效，0无效.忽略该字段
 * @apiSuccess (Success) {Number} data.video.long_type 长度类型，0.短视频，1.中长视频，2.短视频
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *          {
 *               "id": 476,
 *               "created_at": "2019-07-15 07:33:58",
 *               "updated_at": "2019-07-15 07:33:58",
 *               "name": "服裝",
 *               "icon": "",
 *               "sort": 0,
 *               "status": 1,
 *               "remark": null,
 *               "description": null,
 *               "video_num": 615,
 *               "video": [
 *                       {
 *                           "id": 2976,
 *                           "created_at": "2019-07-15 23:25:24",
 *                           "updated_at": "2019-07-15 23:25:24",
 *                           "name": "",
 *                           "icon": "",
 *                           "category_id": 476,
 *                           "subject_id": 1773,
 *                           "mainimg": "",
 *                           "original_m3u8": "",
 *                           "crawler_url": "",
 *                           "m3u8": "",
 *                           "original_mp4": "",
 *                           "mp4": "",
 *                           "long": 0,
 *                           "see_num": 601,
 *                           "tag_ids": "",
 *                           "need_charge": 0,
 *                           "real_see_num": 0,
 *                           "collect_num": 1,
 *                           "real_collect_num": 0,
 *                           "status": 1,
 *                           "long_type": 0
 *                       },
 *                       {
 *                           "id": 2737,
 *                           "created_at": "2019-07-15 22:25:57",
 *                           "updated_at": "2019-07-15 22:25:57",
 *                           "name": "",
 *                           "icon": "",
 *                           "category_id": 476,
 *                           "subject_id": 1770,
 *                           "mainimg": "",
 *                           "original_m3u8": "",
 *                           "crawler_url": ",
 *                           "m3u8": "",
 *                           "original_mp4": "",
 *                           "mp4": "",
 *                           "long": 0,
 *                           "see_num": 410,
 *                           "tag_ids": "",
 *                           "need_charge": 0,
 *                           "real_see_num": 0,
 *                           "collect_num": 10,
 *                       }
 *               ],
 *        },
 *        "msg": "请求成功"
 *     }
 *
 */
$router->get('/categories/videos', function (\Illuminate\Http\Request $request) {

    return End::toSuccessJson(
        VideoRepository::getByCategory(
            $request->get('category_ids') ?: [],
            $request->get('long_types') ? $request->get('long_types') : null,
            $request->get('page') ?: [],
            $request->get('order')
        )
    );

});

/**
 * @api {get} /subjects/app/:appId 获取主题信息(Getting subject)
 * @apiName 获取主题信息(Getting subject)
 * @apiGroup Gateway
 *
 * @apiParam {Number} appId 应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用主题（后台可配置应用拥有哪些主题）,不传则获取所有视频主题
 *
 * @apiSuccess (Success) {number} status 状态码
 * @apiSuccess (Success) {string} msg  消息
 * @apiSuccess (Success) {object} data 数据
 * @apiSuccess (Success) {number} data.id 数据id
 * @apiSuccess (Success) {string} data.created_at 创建时间
 * @apiSuccess (Success) {string} data.updated_at 更新时间
 * @apiSuccess (Success) {string} data.name 名称
 * @apiSuccess (Success) {string} data.icon 图标
 * @apiSuccess (Success) {number} data.status 状态码,忽略
 * @apiSuccess (Success) {string} data.remark 备注
 * @apiSuccess (Success) {string} data.description 描述
 * @apiSuccess (Success) {number} data.category_id 所属分类
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *          {
 *               "id": 1770,
 *               "created_at": "2019-07-15 07:33:58",
 *               "updated_at": "2019-07-15 07:33:58",
 *               "name": "",
 *               "description": null,
 *               "remark": null,
 *               "sort": 0,
 *               "status": 1,
 *               "category_id": 476
 *           },
 *           {
 *               "id": 1771,
 *               "created_at": "2019-07-15 07:33:58",
 *               "updated_at": "2019-07-15 07:33:58",
 *               "name": "",
 *               "description": null,
 *               "remark": null,
 *               "sort": 0,
 *               "status": 1,
 *               "category_id": 476
 *           },
 *        ],
 *        "msg": "请求成功"
 *     }
 *
 */
$router->get('/subjects/app[/{appId:[0-9]+}]', function ($appId = null) {
    if (is_null($appId))
        return End::toSuccessJson(SubjectRepository::get());
    else
        return End::toSuccessJson(SubjectRepository::getByApp($appId));
});

/**
 * @api {get} /subjects/videos 获取指定主题下的视频
 * @apiName 获取指定主题下的视频
 * @apiGroup Video
 *
 * @apiParam {Array} subject_ids 主题ID,可选。传则代表获取指定主题下的视频(以数组形式.数组有多个元素则代表多个分类),不传代表获取全部主题下的视频
 * @apiParam {Array} long_types 长度类型,可选。传则代表获取指定长度类型下的视频(以数组形式.数组有多个元素则代表多个获取长度类型.0.短视频(小于25分钟)，1.中长视频(小于60分钟)，2.长视频(大于60分钟)),不穿代表获取所有长度类型的视频
 * @apiParam {Array} page 分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据
 * @apiParam {String} order 排序，可选。不传代表随机排序。可选项:"see_num desc"代表根据观看次数降序排序,"see_num asc"代表根据观看次数升序排序,"collect_num desc"根据收藏次数降序排序,"collect_num asc"根据收藏次数升序排序,"created_at desc"根据上传时间排序降序排序,"created_at asc"根据上传时间升序排序
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 * @apiSuccess (Success) {Number} data.id 数据id
 * @apiSuccess (Success) {String} data.created_at 创建时间
 * @apiSuccess (Success) {String} data.updated_at 更新时间
 * @apiSuccess (Success) {String} data.name 名称
 * @apiSuccess (Success) {String} data.icon 图标
 * @apiSuccess (Success) {Number} data.status 状态码,忽略
 * @apiSuccess (Success) {String} data.remark 备注
 * @apiSuccess (Success) {String} data.description 描述
 * @apiSuccess (Success) {Number} data.category_id 分类ID
 * @apiSuccess (Success) {Object} data.video 数据集合
 * @apiSuccess (Success) {Number} data.video.id 视频Id
 * @apiSuccess (Success) {String} data.video.name 视频名称
 * @apiSuccess (Success) {String} data.video.icon 视频图标,忽略
 * @apiSuccess (Success) {Number} data.video.category_id 分类ID
 * @apiSuccess (Success) {Number} data.video.subject_id 主题id
 * @apiSuccess (Success) {String} data.video.mainimg 主图地址
 * @apiSuccess (Success) {String} data.video.crawler_url 忽略
 * @apiSuccess (Success) {String} data.video.original_m3u8 忽略
 * @apiSuccess (Success) {String} data.video.m3u8 m3u8文件位置
 * @apiSuccess (Success) {String} data.video.original_mp4 忽略
 * @apiSuccess (Success) {String} data.video.mp4 忽略
 * @apiSuccess (Success) {Number} data.video.long 视频时长,秒数
 * @apiSuccess (Success) {Number} data.video.see_num 视频观看次数,不一定真实(供展现使用)
 * @apiSuccess (Success) {String} data.video.tag_ids 视频标签ID
 * @apiSuccess (Success) {Number} data.video.need_charge 是否需要充值,忽略.1需要，0不需要
 * @apiSuccess (Success) {Number} data.video.real_see_num 真实观看次数,忽略
 * @apiSuccess (Success) {Number} data.video.collect_num 收藏次数，不一定真实(供展现使用)
 * @apiSuccess (Success) {Number} data.real_collect_num 真实收藏次数，忽略
 * @apiSuccess (Success) {Number} data.video.status 状态,1有效，0无效.忽略该字段
 * @apiSuccess (Success) {Number} data.video.long_type 长度类型，0.短视频，1.中长视频，2.短视频
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *          {
 *               "id": 476,
 *               "created_at": "2019-07-15 07:33:58",
 *               "updated_at": "2019-07-15 07:33:58",
 *               "name": "服裝",
 *               "icon": "",
 *               "sort": 0,
 *               "status": 1,
 *               "remark": null,
 *               "description": null,
 *               "category_id": 615,
 *               "video": [
 *                       {
 *                           "id": 2976,
 *                           "created_at": "2019-07-15 23:25:24",
 *                           "updated_at": "2019-07-15 23:25:24",
 *                           "name": "",
 *                           "icon": "",
 *                           "category_id": 476,
 *                           "subject_id": 1773,
 *                           "mainimg": "",
 *                           "original_m3u8": "",
 *                           "crawler_url": "",
 *                           "m3u8": "",
 *                           "original_mp4": "",
 *                           "mp4": "",
 *                           "long": 0,
 *                           "see_num": 601,
 *                           "tag_ids": "",
 *                           "need_charge": 0,
 *                           "real_see_num": 0,
 *                           "collect_num": 1,
 *                           "real_collect_num": 0,
 *                           "status": 1,
 *                           "long_type": 0
 *                       },
 *                       {
 *                           "id": 2737,
 *                           "created_at": "2019-07-15 22:25:57",
 *                           "updated_at": "2019-07-15 22:25:57",
 *                           "name": "",
 *                           "icon": "",
 *                           "category_id": 476,
 *                           "subject_id": 1770,
 *                           "mainimg": "",
 *                           "original_m3u8": "",
 *                           "crawler_url": "",
 *                           "m3u8": "",
 *                           "original_mp4": "",
 *                           "mp4": "",
 *                           "long": 0,
 *                           "see_num": 410,
 *                           "tag_ids": "",
 *                           "need_charge": 0,
 *                           "real_see_num": 0,
 *                           "collect_num": 10,
 *                       }
 *              ],
 *        },
 *        "msg": "请求成功"
 *     }
 *
 */
$router->get('/subjects/videos', function (\Illuminate\Http\Request $request) {

   return End::toSuccessJson(
       VideoRepository::getBySubject(
       $request->get('subject_ids') ?: [],
       $request->get('long_types') ? $request->get('long_types') : null,
       $request->get('page') ?: [],
       $request->get('order')
       )
   );

});

/**
 * @api {get} /subjects/categories 根据分类获取主题
 * @apiName 根据分类获取主题
 * @apiGroup Gateway
 *
 * @apiParam {Array} category_ids 分类ID,可选。根据分类ID获取指定分类下的主提。不传则获取所有分类下的主题
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 * @apiSuccess (Success) {number} data.id 数据id
 * @apiSuccess (Success) {string} data.created_at 创建时间
 * @apiSuccess (Success) {string} data.updated_at 更新时间
 * @apiSuccess (Success) {string} data.name 名称
 * @apiSuccess (Success) {number} data.status 状态码,忽略
 * @apiSuccess (Success) {number} data.sort 排序
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *          {
 *               "video": [
 *                   {
 *                       "id": 461,
 *                       "created_at": "2019-07-15 10:59:45",
 *                       "updated_at": "2019-07-15 10:59:45",
 *                       "name": "HD",
 *                       "status": 1,
 *                       "sort": 0
 *                   },
 *                   {
 *                       "id": 462,
 *                       "created_at": "2019-07-15 11:48:06",
 *                       "updated_at": "2019-07-15 11:48:06",
 *                       "name": "中文字幕",
 *                       "status": 1,
 *                       "sort": 0
 *                   },
 *               ],
 *        },
 *        "msg": "请求成功"
 *     }
 */
$router->get('/subjects/categories', function (\Illuminate\Http\Request $request) {
   return End::toSuccessJson(SubjectRepository::getByCategory($request->get('category_ids') ?: []));
});

/**
 * @api {get} /tags/app/:appId 获取标签
 * @apiGroup Gateway
 * @apiName 获取标签
 *
 * @apiDescription 获取标签信息
 *
 * @apiParam {String} appId 应用ID,可选。传则根据uri格式附加在uri,传则根据应用ID获取所属应用标签（后台可配置应用拥有哪些标签）,不传则获取所有视频标签
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 * @apiSuccess (Success) {Number} data.id 数据id
 * @apiSuccess (Success) {String} data.created_at 创建时间
 * @apiSuccess (Success) {String} data.updated_at 更新时间
 * @apiSuccess (Success) {String} data.name 名称
 * @apiSuccess (Success) {Number} data.status 状态码,忽略
 * @apiSuccess (Success) {Number} data.sort 排序
 *
 * @apiSuccessExample {json} Success-Response:
 * {
 *        "status": 200,
 *        "data": [
 *          {
 *               "video": [
 *                   {
 *                       "id": 461,
 *                       "created_at": "2019-07-15 10:59:45",
 *                       "updated_at": "2019-07-15 10:59:45",
 *                       "name": "HD",
 *                       "status": 1,
 *                       "sort": 0
 *                   },
 *                   {
 *                       "id": 462,
 *                       "created_at": "2019-07-15 11:48:06",
 *                       "updated_at": "2019-07-15 11:48:06",
 *                       "name": "中文字幕",
 *                       "status": 1,
 *                       "sort": 0
 *                   },
 *               ],
 *        },
 *        "msg": "请求成功"
 * }
 *
 */
$router->get('/tags/app[/{appId:[0-9]+}]', function ($appId = null) {
    if (is_null($appId))
        return End::toSuccessJson(TagRepository::get());
    else {
        return End::toSuccessJson(TagRepository::getByApp($appId));
    }
});

/**
 * @api {get} /tags/videos 获取标签下视频
 * @apiName 获取标签下视频
 * @apiGroup Video
 *
 * @apiParam {Array} tag_ids 标签ID,可选。传则代表获取指定标签下的视频(以数组形式.数组有多个元素则代表多个分类),不传代表获取全部标签下的视频
 * @apiParam {Array} long_types 长度类型,可选。传则代表获取指定长度类型下的视频(以数组形式.数组有多个元素则代表多个获取长度类型.0.短视频(小于25分钟)，1.中长视频(小于60分钟)，2.长视频(大于60分钟)),不穿代表获取所有长度类型的视频
 * @apiParam {Array} page 分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 * @apiSuccess (Success) {Number} data.id 数据id
 * @apiSuccess (Success) {String} data.created_at 创建时间
 * @apiSuccess (Success) {String} data.updated_at 更新时间
 * @apiSuccess (Success) {String} data.name 名称
 * @apiSuccess (Success) {String} data.icon 图标
 * @apiSuccess (Success) {Number} data.status 状态码,忽略
 * @apiSuccess (Success) {String} data.remark 备注
 * @apiSuccess (Success) {String} data.description 描述
 * @apiSuccess (Success) {Number} data.category_id 分类ID
 * @apiSuccess (Success) {Object} data.video 数据集合
 * @apiSuccess (Success) {Number} data.video.id 视频Id
 * @apiSuccess (Success) {String} data.video.name 视频名称
 * @apiSuccess (Success) {String} data.video.icon 视频图标,忽略
 * @apiSuccess (Success) {Number} data.video.category_id 分类ID
 * @apiSuccess (Success) {Number} data.video.subject_id 主题id
 * @apiSuccess (Success) {String} data.video.mainimg 主图地址
 * @apiSuccess (Success) {String} data.video.crawler_url 忽略
 * @apiSuccess (Success) {String} data.video.original_m3u8 忽略
 * @apiSuccess (Success) {String} data.video.m3u8 m3u8文件位置
 * @apiSuccess (Success) {String} data.video.original_mp4 忽略
 * @apiSuccess (Success) {String} data.video.mp4 忽略
 * @apiSuccess (Success) {Number} data.video.long 视频时长,秒数
 * @apiSuccess (Success) {Number} data.video.see_num 视频观看次数,不一定真实(供展现使用)
 * @apiSuccess (Success) {String} data.video.tag_ids 视频标签ID
 * @apiSuccess (Success) {Number} data.video.need_charge 是否需要充值,忽略.1需要，0不需要
 * @apiSuccess (Success) {Number} data.video.real_see_num 真实观看次数,忽略
 * @apiSuccess (Success) {Number} data.video.collect_num 收藏次数，不一定真实(供展现使用)
 * @apiSuccess (Success) {Number} data.real_collect_num 真实收藏次数，忽略
 * @apiSuccess (Success) {Number} data.video.status 状态,1有效，0无效.忽略该字段
 * @apiSuccess (Success) {Number} data.video.long_type 长度类型，0.短视频，1.中长视频，2.短视频
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *          {
 *               "id": 476,
 *               "created_at": "2019-07-15 07:33:58",
 *               "updated_at": "2019-07-15 07:33:58",
 *               "name": "服裝",
 *               "icon": "",
 *               "sort": 0,
 *               "status": 1,
 *               "remark": null,
 *               "description": null,
 *               "category_id": 615,
 *               "video": [
 *                       {
 *                           "id": 2976,
 *                           "created_at": "2019-07-15 23:25:24",
 *                           "updated_at": "2019-07-15 23:25:24",
 *                           "name": "",
 *                           "icon": "",
 *                           "category_id": 476,
 *                           "subject_id": 1773,
 *                           "mainimg": "",
 *                           "original_m3u8": "",
 *                           "crawler_url": "",
 *                           "m3u8": "",
 *                           "original_mp4": "",
 *                           "mp4": "",
 *                           "long": 0,
 *                           "see_num": 601,
 *                           "tag_ids": "",
 *                           "need_charge": 0,
 *                           "real_see_num": 0,
 *                           "collect_num": 1,
 *                           "real_collect_num": 0,
 *                           "status": 1,
 *                           "long_type": 0
 *                       },
 *                       {
 *                           "id": 2737,
 *                           "created_at": "2019-07-15 22:25:57",
 *                           "updated_at": "2019-07-15 22:25:57",
 *                           "name": "",
 *                           "icon": "",
 *                           "category_id": 476,
 *                           "subject_id": 1770,
 *                           "mainimg": "",
 *                           "original_m3u8": "",
 *                           "crawler_url": "",
 *                           "m3u8": "",
 *                           "original_mp4": "",
 *                           "mp4": "",
 *                           "long": 0,
 *                           "see_num": 410,
 *                           "tag_ids": "",
 *                           "need_charge": 0,
 *                           "real_see_num": 0,
 *                           "collect_num": 10,
 *                       }
 *              ],
 *        },
 *        "msg": "请求成功"
 *     }
 *
 */
$router->get('/tags/videos', function (\Illuminate\Http\Request $request) {

    return End::toSuccessJson(
        VideoRepository::getByTag(
            $request->get('tag_ids') ?: [],
            $request->get('long_types') ? $request->get('long_types') : null,
            $request->get('page') ?: []
        )
    );

});

/**
 * @api {get} /videos 获取视频列表(Video list)
 * @apiName 获取视频列表(Video list)
 * @apiGroup Video
 *
 * @apiParam {Array} ids 视频ID,可选。获取指定类型的视频列表,不传则获取所有视频。
 * @apiParam {Array} long_types 长度类型,可选。获取指定长度类型的视频,不传则获取所有长度类型的视频。
 * @apiParam {Array} page 分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据
 * @apiParam {String} order 排序,可选。不传代表随机排序。可选项:"see_num desc"代表根据观看次数降序排序,"see_num asc"代表根据观看次数升序排序,"collect_num desc"根据收藏次数降序排序,"collect_num asc"根据收藏次数升序排序,"created_at desc"根据上传时间排序降序排序,"created_at asc"根据上传时间升序排序
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 * @apiSuccess (Success) {Number} data.id 视频Id
 * @apiSuccess (Success) {String} data.name 视频名称
 * @apiSuccess (Success) {String} data.icon 视频图标,忽略
 * @apiSuccess (Success) {Number} data.category_id 分类ID
 * @apiSuccess (Success) {Number} data.subject_id 主题id
 * @apiSuccess (Success) {String} data.mainimg 主图地址
 * @apiSuccess (Success) {String} data.crawler_url 忽略
 * @apiSuccess (Success) {String} data.original_m3u8 忽略
 * @apiSuccess (Success) {String} data.m3u8 m3u8文件位置
 * @apiSuccess (Success) {String} data.original_mp4 忽略
 * @apiSuccess (Success) {String} data.mp4 忽略
 * @apiSuccess (Success) {Number} data.long 视频时长,秒数
 * @apiSuccess (Success) {Number} data.see_num 视频观看次数,不一定真实(供展现使用)
 * @apiSuccess (Success) {String} data.tag_ids 视频标签ID
 * @apiSuccess (Success) {Number} data.need_charge 是否需要充值,忽略.1需要，0不需要
 * @apiSuccess (Success) {Number} data.real_see_num 真实观看次数,忽略
 * @apiSuccess (Success) {Number} data.collect_num 收藏次数，不一定真实(供展现使用)
 * @apiSuccess (Success) {Number} data.real_collect_num 真实收藏次数，忽略
 * @apiSuccess (Success) {Number} data.status 状态,1有效，0无效.忽略该字段
 * @apiSuccess (Success) {Number} data.long_type 长度类型，0.短视频，1.中长视频，2.短视频
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *                   {
 *                    "id": 430,
 *                    "created_at": "2019-07-15 11:47:20",
 *                    "updated_at": "2019-07-15 11:47:20",
 *                    "name": "",
 *                    "icon": "",
 *                    "category_id": 476,
 *                    "subject_id": 1773,
 *                    "mainimg": "",
 *                    "original_m3u8": "",
 *                    "crawler_url": "",
 *                    "m3u8": "",
 *                    "original_mp4": "",
 *                    "mp4": "",
 *                    "long": 0,
 *                    "see_num": 334,
 *                    "tag_ids": "",
 *                    "need_charge": 0,
 *                    "real_see_num": 0,
 *                    "collect_num": 34,
 *                    "real_collect_num": 0,
 *                    "status": 1,
 *                    "long_type": 0
 *                   },
 *               ],
 *        "msg": "请求成功"
 *     }
 */
$router->get('/videos', function (\Illuminate\Http\Request $request) {

    return End::toSuccessJson(
        VideoRepository::get(
            $request->get('ids') ?: [],
            $request->get('long_types') ? $request->get('long_types') : [],
            $request->get('page') ?: [],
            $request->get('order')
        )
    );

});

/**
 * @api {get} /video/:videoId 获取某条视频
 * @apiName 获取某条视频
 * @apiGroup Video
 *
 * @apiParam {Number} videoId 视频ID,必选。根据uri规则附加在uri。
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 * @apiSuccess (Success) {Number} data.id 视频Id
 * @apiSuccess (Success) {String} data.name 视频名称
 * @apiSuccess (Success) {String} data.icon 视频图标,忽略
 * @apiSuccess (Success) {Number} data.category_id 分类ID
 * @apiSuccess (Success) {Number} data.subject_id 主题id
 * @apiSuccess (Success) {String} data.mainimg 主图地址
 * @apiSuccess (Success) {String} data.crawler_url 忽略
 * @apiSuccess (Success) {String} data.original_m3u8 忽略
 * @apiSuccess (Success) {String} data.m3u8 m3u8文件位置
 * @apiSuccess (Success) {String} data.original_mp4 忽略
 * @apiSuccess (Success) {String} data.mp4 忽略
 * @apiSuccess (Success) {Number} data.long 视频时长,秒数
 * @apiSuccess (Success) {Number} data.see_num 视频观看次数,不一定真实(供展现使用)
 * @apiSuccess (Success) {String} data.tag_ids 视频标签ID
 * @apiSuccess (Success) {Number} data.need_charge 是否需要充值,忽略.1需要，0不需要
 * @apiSuccess (Success) {Number} data.real_see_num 真实观看次数,忽略
 * @apiSuccess (Success) {Number} data.collect_num 收藏次数，不一定真实(供展现使用)
 * @apiSuccess (Success) {Number} data.real_collect_num 真实收藏次数，忽略
 * @apiSuccess (Success) {Number} data.status 状态,1有效，0无效.忽略该字段
 * @apiSuccess (Success) {Number} data.long_type 长度类型，0.短视频，1.中长视频，2.短视频
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data":{
 *                 "id": 430,
 *                 "created_at": "2019-07-15 11:47:20",
 *                 "updated_at": "2019-07-15 11:47:20",
 *                 "name": "",
 *                 "icon": "",
 *                 "category_id": 476,
 *                 "subject_id": 1773,
 *                 "mainimg": "",
 *                 "original_m3u8": "",
 *                 "crawler_url": "",
 *                 "m3u8": "",
 *                 "original_mp4": "",
 *                 "mp4": "",
 *                 "long": 0,
 *                 "see_num": 334,
 *                 "tag_ids": "",
 *                 "need_charge": 0,
 *                 "real_see_num": 0,
 *                 "collect_num": 34,
 *                 "real_collect_num": 0,
 *                 "status": 1,
 *                 "long_type": 0
 *         },
 *        "msg": "请求成功"
 *     }
 */
$router->get('/video/{id:[0-9]+}', function ($id) {
    return End::toSuccessJson(VideoRepository::find($id) ?: []);
});

/**
 * @api {post} /register/email 通过邮箱会员注册
 * @apiName 通过邮箱会员注册
 * @apiGroup User
 *
 * @apiParam {String} nickname 用户名
 * @apiParam {String} email 邮箱
 * @apiParam {String} password 密码
 * @apiParam {String} password_confirmation 确认密码
 * @apiParam {Number} sex 性别。1.男，0.女
 * @apiParam {Number} app_id 应用ID
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 *
 * @apiErrorExample {json} ValidationError:
 *     {
 *      "status": 403,
 *      "msg": "请求错误",
 *       "data": {
 *           "password": [
 *               "密码不正确"
 *           ]
 *       }
 *     }
 */
$router->post('/register/email', 'Auth\RegisterController@byEmail');

/**
 * @api {post} /register/sms 通过手机会员注册发送验证码
 * @apiName 通过手机会员注册发送验证码
 * @apiGroup User
 *
 * @apiParam {String} phone 手机号码
 * @apiParam {Number} app_id 应用ID
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 *
 * @apiErrorExample {json} ValidationError:
 *     {
 *      "status": 403,
 *      "msg": "请求错误",
 *       "data": {
 *           "password": [
 *               "密码不正确"
 *           ]
 *       }
 *     }
 */
$router->post('/register/sms', 'Auth\RegisterController@byPhoneToSms');

/**
 * @api {post} /register/phone 通过手机会员注册(Rigister by phone)
 * @apiName (Rigister by phone)通过手机会员注册
 * @apiGroup User
 *
 * @apiParam {String} nickname 用户名
 * @apiParam {String} phone 手机
 * @apiParam {String} code 验证码
 * @apiParam {String} password 密码
 * @apiParam {String} password_confirmation 确认密码
 * @apiParam {Number} sex 性别。1.男，0.女
 * @apiParam {Number} app_id 应用ID
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 *
 * @apiErrorExample {json} ValidationError:
 *     {
 *      "status": 403,
 *      "msg": "请求错误",
 *       "data": {
 *           "password": [
 *               "密码不正确"
 *           ]
 *       }
 *     }
 */
$router->post('/register/phone', 'Auth\RegisterController@byPhone');

/**
 * @api {post} /login 会员登录
 * @apiName 会员登录
 * @apiGroup User
 *
 * @apiParam {String} account 用户名/邮箱/手机号码
 * @apiParam {String} password 密码
 * @apiParam {Number} remember_me,0不免登陆,1免登陆(永久)
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 *
 * @apiErrorExample {json} ValidationError:
 *     {
 *      "status": 403,
 *      "msg": "请求错误",
 *       "data": {
 *           "password": [
 *               "密码不正确"
 *           ]
 *       }
 *    }
 */
$router->post('/login', 'Auth\LoginController@login');

/**
 * @api {post} /forget-password/send-code/email (Email sending code)找回密码通过邮箱发送验证码
 * @apiName (Email sending code)找回密码通过邮箱发送验证码
 * @apiGroup User
 *
 * @apiParam {String} nickname 用户名
 * @apiParam {String} email 邮箱
 * @apiParam {Number} app_id 应用ID
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 * @apiErrorExample {json} ValidationError:
 *     {
 *      "status": 403,
 *      "msg": "请求错误",
 *       "data": {
 *           "nickname": [
 *               "用户名不存在"
 *           ]
 *       }
 *    }
 */
$router->post('/forget-password/send-code/email', 'Auth\ForgetController@sendVerifyCodeByEmail');

/**
 * @api {post} /forget-password/send-code/phone (Phone sending code)找回密码通过手机发送验证码
 * @apiName (Phone sending code)找回密码通过手机发送验证码
 * @apiGroup User
 *
 * @apiParam {String} nickname 用户名
 * @apiParam {String} phone 手机
 * @apiParam {Number} app_id 应用ID
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 * @apiErrorExample {json} ValidationError:
 *     {
 *      "status": 403,
 *      "msg": "请求错误",
 *       "data": {
 *           "nickname": [
 *               "用户名不存在"
 *           ]
 *       }
 *    }
 */
$router->post('/forget-password/send-code/phone', 'Auth\ForgetController@sendVerifyCodeByPhone');

/**
 * @api {post} /forget-password/reset 找回密码重置密码
 * @apiName 找回密码重置密码
 * @apiGroup User
 *
 * @apiParam {String} phone 手机号码,可选
 * @apiParam {String} email 邮箱,可选
 * @apiParam {String} password 新密码
 * @apiParam {String} password_confirmation 确认密码
 * @apiParam {Number} app_id 应用ID
 * @apiParam {Number} code 验证码
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 *
 * @apiErrorExample {json} ValidationError:
 *     {
 *      "status": 403,
 *      "msg": "请求错误",
 *       "data": {
 *           "code": [
 *               "验证码不正确"
 *           ]
 *       }
 *    }
 */
$router->post('/forget-password/reset', 'Auth\ForgetController@resetPassword');

/**
 * 需登录校验的模块
 */
$router->group(['middleware' => 'auth'], function () use ($router) {

    /**
     * @api {post} /logout 会员退出登录
     * @apiName 会员退出登录
     * @apiGroup User
     *
     * @apiParam {String} token 用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
     *
     * @apiSuccess (Success) {Number} status 状态码
     * @apiSuccess (Success) {String} msg  消息
     *
     * @apiSuccess (Success)Example Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "status": 200,
     *        "data": [],
     *        "msg": "请求成功"
     *     }
     *
     * @apiErrorExample {json} ValidationError:
     *     {
     *      "status": 401,
     *      "msg": "请求错误",
     *       "data": {
     *       }
     *    }
     */
    $router->post('/logout', 'Auth\LoginController@logout');

    /**
     * @api {post} /reset/password 主动重置密码
     * @apiName 主动重置密码
     * @apiGroup User
     *
     * @apiParam {String} token 用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
     * @apiParam {String} old_password 用户名
     * @apiParam {String} password 新密码
     * @apiParam {String} password_confirmation 确认密码
     *
     * @apiSuccess (Success) {Number} status 状态码
     * @apiSuccess (Success) {String} msg  消息
     *
     * @apiSuccess (Success)Example Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "status": 200,
     *        "data": [],
     *        "msg": "请求成功"
     *     }
     *
     * @apiErrorExample {json} ValidationError:
     *     {
     *      "status": 403,
     *      "msg": "请求错误",
     *       "data": {
     *           "old_password": [
     *               "原密码不正确"
     *           ]
     *       }
     *    }
     */
    $router->post('/reset/password', 'UserController@resetPassword');

    /**
     * @api {get} /user/video/records 获取视频浏览记录(Skiming video)
     * @apiName 获取视频浏览记录(Skiming video)
     * @apiGroup User
     *
     * @apiParam {String} token 用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
     *
     * @apiSuccess (Success) {Number} status 状态码
     * @apiSuccess (Success) {String} msg  消息
     * @apiSuccess (Success) {Object} data 数据
     * @apiSuccess (Success) {Number} data.id 视频Id
     * @apiSuccess (Success) {String} data.name 视频名称
     * @apiSuccess (Success) {String} data.icon 视频图标,忽略
     * @apiSuccess (Success) {Number} data.category_id 分类ID
     * @apiSuccess (Success) {Number} data.subject_id 主题id
     * @apiSuccess (Success) {String} data.mainimg 主图地址
     * @apiSuccess (Success) {String} data.crawler_url 忽略
     * @apiSuccess (Success) {String} data.original_m3u8 忽略
     * @apiSuccess (Success) {String} data.m3u8 m3u8文件位置
     * @apiSuccess (Success) {String} data.original_mp4 忽略
     * @apiSuccess (Success) {String} data.mp4 忽略
     * @apiSuccess (Success) {Number} data.long 视频时长,秒数
     * @apiSuccess (Success) {Number} data.see_num 视频观看次数,不一定真实(供展现使用)
     * @apiSuccess (Success) {String} data.tag_ids 视频标签ID
     * @apiSuccess (Success) {Number} data.need_charge 是否需要充值,忽略.1需要，0不需要
     * @apiSuccess (Success) {Number} data.real_see_num 真实观看次数,忽略
     * @apiSuccess (Success) {Number} data.collect_num 收藏次数，不一定真实(供展现使用)
     * @apiSuccess (Success) {Number} data.real_collect_num 真实收藏次数，忽略
     * @apiSuccess (Success) {Number} data.status 状态,1有效，0无效.忽略该字段
     * @apiSuccess (Success) {Number} data.long_type 长度类型，0.短视频，1.中长视频，2.短视频
     *
     * @apiSuccess (Success)Example Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "status": 200,
     *        "data": [
     *          {
     *              "id": 430,
     *              "created_at": "2019-07-15 11:47:20",
     *              "updated_at": "2019-07-15 11:47:20",
     *              "name": "",
     *              "icon": "",
     *              "category_id": 476,
     *              "subject_id": 1773,
     *              "mainimg": "",
     *              "original_m3u8": "",
     *              "crawler_url": "",
     *              "m3u8": "",
     *              "original_mp4": "",
     *              "mp4": "",
     *              "long": 0,
     *              "see_num": 334,
     *              "tag_ids": "",
     *              "need_charge": 0,
     *              "real_see_num": 0,
     *              "collect_num": 34,
     *              "real_collect_num": 0,
     *              "status": 1,
     *              "long_type": 0
     *         },
     *        ],
     *        "msg": "请求成功"
     *     }
     * @apiErrorExample {json} ValidationError:
     *     {
     *      "status": 401,
     *      "msg": "请求错误",
     *       "data": {
     *
     *       }
     *    }
     */
    $router->get('/user/video/records', 'UserController@getSeeVideoRecords');

    /**
     * @api {post} /user/video/:videoId/collect 用户收藏视频(User collect video)
     * @apiName User collect video(用户收藏视频)
     * @apiGroup User
     *
     * @apiParam {Number} videoId 必选,视频ID。根据uri规则附加到uri上。
     * @apiParam {String} token 用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
     *
     * @apiSuccess (Success)Example Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "status": 200,
     *        "data": [],
     *        "msg": "请求成功"
     *     }
     *
     *
     *  @apiErrorExample {json} ValidationError:
     *     {
     *      "status": 401,
     *      "msg": "请求错误",
     *       "data": {
     *
     *       }
     *    }
     */
    $router->post('/user/video/{videoId:[0-9]+}/collect', 'UserController@collectVideo');

    /**
     * @api {get} /user/video/collect 获取视频收藏记录(Geting Collect)
     * @apiName (Geting Collect)获取视频收藏记录
     * @apiGroup User
     *
     * @apiParam {String} token 用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
     *
     * @apiSuccess (Success) {Number} status 状态码
     * @apiSuccess (Success) {String} msg  消息
     * @apiSuccess (Success) {Object} data 数据
     * @apiSuccess (Success) {Number} data.id 视频Id
     * @apiSuccess (Success) {String} data.name 视频名称
     * @apiSuccess (Success) {String} data.icon 视频图标,忽略
     * @apiSuccess (Success) {Number} data.category_id 分类ID
     * @apiSuccess (Success) {Number} data.subject_id 主题id
     * @apiSuccess (Success) {String} data.mainimg 主图地址
     * @apiSuccess (Success) {String} data.crawler_url 忽略
     * @apiSuccess (Success) {String} data.original_m3u8 忽略
     * @apiSuccess (Success) {String} data.m3u8 m3u8文件位置
     * @apiSuccess (Success) {String} data.original_mp4 忽略
     * @apiSuccess (Success) {String} data.mp4 忽略
     * @apiSuccess (Success) {Number} data.long 视频时长,秒数
     * @apiSuccess (Success) {Number} data.see_num 视频观看次数,不一定真实(供展现使用)
     * @apiSuccess (Success) {String} data.tag_ids 视频标签ID
     * @apiSuccess (Success) {Number} data.need_charge 是否需要充值,忽略.1需要，0不需要
     * @apiSuccess (Success) {Number} data.real_see_num 真实观看次数,忽略
     * @apiSuccess (Success) {Number} data.collect_num 收藏次数，不一定真实(供展现使用)
     * @apiSuccess (Success) {Number} data.real_collect_num 真实收藏次数，忽略
     * @apiSuccess (Success) {Number} data.status 状态,1有效，0无效.忽略该字段
     * @apiSuccess (Success) {Number} data.long_type 长度类型，0.短视频，1.中长视频，2.短视频
     *
     * @apiSuccess (Success)Example Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "status": 200,
     *        "data": [
     *          {
     *              "id": 430,
     *              "created_at": "2019-07-15 11:47:20",
     *              "updated_at": "2019-07-15 11:47:20",
     *              "name": "",
     *              "icon": "",
     *              "category_id": 476,
     *              "subject_id": 1773,
     *              "mainimg": "",
     *              "original_m3u8": "",
     *              "crawler_url": "",
     *              "m3u8": "",
     *              "original_mp4": "",
     *              "mp4": "",
     *              "long": 0,
     *              "see_num": 334,
     *              "tag_ids": "",
     *              "need_charge": 0,
     *              "real_see_num": 0,
     *              "collect_num": 34,
     *              "real_collect_num": 0,
     *              "status": 1,
     *              "long_type": 0
     *         },
     *        ],
     *        "msg": "请求成功"
     *     }
     * @apiErrorExample {json} ValidationError:
     *     {
     *      "status": 401,
     *      "msg": "请求错误",
     *       "data": {
     *
     *       }
     *    }
     */
    $router->get('/user/video/collect', 'UserController@getCollectVideos');

    /**
     * @api {post} /user/sms/bind-phone 绑定手机发送验证码(Binding phone to sms)
     * @apiName (Binding phone to sms)输入验证码并绑定手机
     * @apiGroup User
     *
     * @apiParam {String} token 用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
     * @apiParam {String} phone 手机号码
     *
     * @apiSuccess (Success)Example Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "status": 200,
     *        "data": [
     *          {
     *         },
     *        ],
     *        "msg": "请求成功"
     *     }
     * @apiErrorExample {json} ValidationError:
     *     {
     *      "status": 401,
     *      "msg": "请求错误",
     *       "data": {
     *
     *       }
     *    }
     */
    $router->post('/user/sms/bind-phone', 'UserController@bindPhoneToSms');

    /**
     * @api {post} /user/bind-phone 输入验证码并绑定手机(Binding phone)
     * @apiName (Binding phone)输入验证码并绑定手机
     * @apiGroup User
     *
     * @apiParam {String} token 用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
     * @apiParam {String} phone 手机号码
     * @apiParam {String} code 手机验证码
     *
     * @apiSuccess (Success)Example Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *        "status": 200,
     *        "data": [
     *          {
     *         },
     *        ],
     *        "msg": "请求成功"
     *     }
     * @apiErrorExample {json} ValidationError:
     *     {
     *      "status": 401,
     *      "msg": "请求错误",
     *       "data": {
     *
     *       }
     *    }
     */
    $router->post('/user/bind-phone', 'UserController@bindPhone');

    $router->get('/user/info', function () {
       return End::toSuccessJson(Auth::user()->toArray());
    });
});


/**
 * @api {get} /search-videos 搜索视频
 * @apiName 搜索视频
 * @apiGroup Video
 *
 * @apiParam {Number} app_id 应用ID，可选。不传则代表从所有片源里面搜索。传则从和应用中相关分类视频片源种搜索
 * @apiParam {String} keyword 关键词
 * @apiParam {Array} long_types 长度类型
 * @apiParam {Array} page 分页,可选,不传代表获取所有视频。示例:[0, 10],从第一个元素起的10条记录。第一个数组元素代表从第几条数据开始获取，第二个元素代表获取多少数据
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Number} data.id 视频Id
 * @apiSuccess (Success) {String} data.name 视频名称
 * @apiSuccess (Success) {String} data.icon 视频图标,忽略
 * @apiSuccess (Success) {Number} data.category_id 分类ID
 * @apiSuccess (Success) {Number} data.subject_id 主题id
 * @apiSuccess (Success) {String} data.mainimg 主图地址
 * @apiSuccess (Success) {String} data.crawler_url 忽略
 * @apiSuccess (Success) {String} data.original_m3u8 忽略
 * @apiSuccess (Success) {String} data.m3u8 m3u8文件位置
 * @apiSuccess (Success) {String} data.original_mp4 忽略
 * @apiSuccess (Success) {String} data.mp4 忽略
 * @apiSuccess (Success) {Number} data.long 视频时长,秒数
 * @apiSuccess (Success) {Number} data.see_num 视频观看次数,不一定真实(供展现使用)
 * @apiSuccess (Success) {String} data.tag_ids 视频标签ID
 * @apiSuccess (Success) {Number} data.need_charge 是否需要充值,忽略.1需要，0不需要
 * @apiSuccess (Success) {Number} data.real_see_num 真实观看次数,忽略
 * @apiSuccess (Success) {Number} data.collect_num 收藏次数，不一定真实(供展现使用)
 * @apiSuccess (Success) {Number} data.real_collect_num 真实收藏次数，忽略
 * @apiSuccess (Success) {Number} data.status 状态,1有效，0无效.忽略该字段
 * @apiSuccess (Success) {Number} data.long_type 长度类型，0.短视频，1.中长视频，2.短视频
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *            {
 *                 "id": 430,
 *                 "created_at": "2019-07-15 11:47:20",
 *                 "updated_at": "2019-07-15 11:47:20",
 *                 "name": "",
 *                 "icon": "",
 *                 "category_id": 476,
 *                 "subject_id": 1773,
 *                 "mainimg": "",
 *                 "original_m3u8": "",
 *                 "crawler_url": "",
 *                 "m3u8": "",
 *                 "original_mp4": "",
 *                 "mp4": "",
 *                 "long": 0,
 *                 "see_num": 334,
 *                 "tag_ids": "",
 *                 "need_charge": 0,
 *                 "real_see_num": 0,
 *                 "collect_num": 34,
 *                 "real_collect_num": 0,
 *                 "status": 1,
 *                 "long_type": 0
 *              },
 *         ],
 *        "msg": "请求成功"
 *     }
 */
$router->get('/search-videos', 'SearchController@searchVideos');

/**
 * @api {post} /user/see/video/:videoId 观看视频事件(客户端观看视频需触发此接口)
 * @apiName 观看视频事件(客户端观看视频需触发此接口)
 * @apiGroup Video
 *
 * @apiParam {Number} videoId 必选,视频ID。根据uri规则附加到uri上。
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 */
$router->post('/user/see/video/{videoId:[0-9]+}', 'UserController@seeVideo');

/**
 * @api {post} /user/like/:status/video/videoId:[0-9]+ 用户点赞或者点踩
 * @apiName 用户点赞或者点踩)
 * @apiGroup Video
 *
 * @apiParam {Number} status 必选,类型，1点赞，0点踩。根据uri规则附加到uri上。
 * @apiParam {Number} videoId 视频ID,必选。根据uri规则附加在uri。
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 */
$router->post('/user/like/{status:[0-1]}/video/{videoId:[0-9]+}', 'UserController@isLikeVideo');

/**
 * @api {post} /feedback 提交反馈留言
 * @apiName (Feedback)提交反馈留言
 * @apiGroup User
 *
 * @apiParam {String} token 可选,用户登录后返回的Token，需携带在http header的Authorization字段，例:Authorization Bearer xxxxxx
 * @apiParam {Sting} message 必选,留言
 * @apiParam {Number} score 必选,分数
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 */
$router->post('/feedback', function (\Illuminate\Http\Request $request) {
    if ($request->input('message') && $request->input('score')) {
        \App\Repositories\FeedbackRepository::create($request->all());
    }
    return End::toSuccessJson();
});

/**
 * @api {post} /site-bottom/:appId 获取底部栏目配置
 * @apiName 获取底部栏目配置
 * @apiGroup Setting
 * @apiParam {Number} appId 应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用分类（后台可配置应用拥有哪些分类）,不传则获取所有视频分类
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [],
 *        "msg": "请求成功"
 *     }
 */
$router->get('/site-bottom/{appId:[0-9]+}', function ($appId) {
    return End::toSuccessJson(\App\Repositories\SettingRepository::getBottom($appId));
});

/**
 * @api {post} /adverts/:appId 获取广告配置
 * @apiName 获取广告配置
 * @apiGroup Setting
 * @apiParam {Number} appId 应用ID,可选,传则根据uri格式附加在uri,传则根据应用ID获取所属应用分类（后台可配置应用拥有哪些分类）,不传则获取所有视频分类
 *
 * @apiSuccess (Success) {Number} status 状态码
 * @apiSuccess (Success) {String} msg  消息
 * @apiSuccess (Success) {Object} data 数据
 *
 * @apiSuccess (Success)Example Success-Response:
 *     HTTP/1.1 200 OK
 *     {
 *        "status": 200,
 *        "data": [
 *                  "id": 1,
 *                   "name": "首页轮播图广告",
 *                   "status": 1,
 *                   "app_id": 1,
 *                   "sort": 0,
 *                   "remark": "",
 *                   "created_at": "2019-08-19 01:56:03",
 *                   "updated_at": "2019-08-19 01:56:03",
 *                   "advert": [
 *                       {
 *                           "id": 4,
 *                           "img": "images/1f9005bb57dff0289f761116d5bc1e64.jpg",
 *                           "url": "http://www.baidu.com",
 *                           "status": 1,
 *                           "sort": 0,
 *                           "remark": "",
 *                           "started_at": null,
 *                           "expired_at": null,
 *                           "advert_position_id": 1,
 *                           "created_at": "2019-09-01 02:41:14",
 *                           "updated_at": "2019-09-01 02:41:14"
 *                       },
 *
 *         ],
 *        "msg": "请求成功"
 *     }
 */
$router->get('/adverts/{appId:[0-9]+}', function ($appId) {
    return End::toSuccessJson(\App\Repositories\SettingRepository::getAdverts($appId));
});
