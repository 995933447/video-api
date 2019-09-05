<?php
namespace App\Http\Controllers;

use App\Services\ServiceCaller;
use App\Services\Search\Tasks\SearchVideos;
use App\Tools\Fomatter\End;
use Illuminate\Http\Request;

class SearchController
{
    public function searchVideos(Request $request)
    {
        $result = ServiceCaller::call(
            ServiceCaller::TASK_SERVICE,
            new SearchVideos(
                (int)$request->input('app_id'),
                $request->input('keyword'),
                $request->get('long_types') ?: null,
                is_array($request->input('page')) && isset($request->input('page')[0]) ? (int) $request->input('page')[0] : 0,
                is_array($request->input('page')) && isset($request->input('page')[1]) ? (int) $request->input('page')[1] : 0
            )
        );

        return End::toSuccessJson($result);
    }
}
