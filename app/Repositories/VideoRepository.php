<?php
namespace App\Repositories;

use App\Category;
use App\Subject;
use App\Tag;
use App\Video;
use App\Services\ServiceCaller;
use App\Services\Search\Tasks\SearchVideos;
use Illuminate\Support\Facades\Auth;

class VideoRepository
{
    public static function get(array $ids = [], ?array $longTypes = null, array $page = [], ?array $order = null): array
    {
        $model = new Video();
        $primaryKey = $model->getPrimaryKey();

        $queryBuilder = $model->where(Video::STATUS_FIELD, Video::VALID_STATUS);

        if ($longTypes) {
            $queryBuilder = $queryBuilder->whereIn(Video::LONG_TYPE_FIELD, $longTypes);
        }

        if ($ids) {
            $queryBuilder->whereIn($primaryKey, $ids);
        }

        if ($page) {
            if (isset($page[0]) && (int)$page[0]) {
                $queryBuilder->offset($page[0]);
            }

            if (isset($page[1]) && (int)$page[1]) {
                $queryBuilder->limit($page[1]);
            }
        }

        if($order) {
            $queryBuilder->orderBy(...$order);
        } else {
            $queryBuilder->inRandomOrder();
        }

        return $queryBuilder->get()->toArray();
    }

    public static function find(int $id): array
    {
        $video = (new Video())->where(Video::STATUS_FIELD, Video::VALID_STATUS)->where(Video::PRIMARY_ID_FIELD, $id);
        if (!Auth::check()) {
            $video->where(Video::NEED_LOGIN_FIELD, Video::NEED_NOT_LOGIN_TYPE);
        }

        if ($result = $video->first()) {
            return $result->makeVisible(Video::M3U8_FIELD)->toArray();
        }
        return [];
    }

    public static function getByCategory(array $categoryIds = null, ?array $longTypes = null, array $page = null, ?array $order = null): array
    {
        $model = new Category();
        $primaryKey = $model->getPrimaryKey();

        if (isset($page[0]) && (int)$page[0]) {
            $model->setCurrentOffset((int)$page[0]);
        }

        if (isset($page[1]) && (int) $page[1]) {
            $model->setPerPageLimit((int)$page[1]);
        }

        if($order) {
            $model->setOrder($order);
        }

        if ($longTypes) {
           $model->setLongTypes($longTypes);
        }

        if ($categoryIds) {
            $model = $model->whereIn($primaryKey, $categoryIds);
        }

        if (count($categoryIds) == 1) {
            return $model->with('video')->where(Category::STATUS_FIELD, Category::VALID_STATUS)->get()->toArray();
        } else {
            $data = $model->where(Category::STATUS_FIELD, Category::VALID_STATUS)->get();
            $data->each(function ($category) {
               $category->load('video');
            });
            return $data->toArray();
        }
    }

    public static function getBySubject(array $subjectIds = null, ?int $longTypes = null, array $page = null, ?array $order = null): array
    {
        $model = new Subject();
        $primaryKey = $model->getPrimaryKey();

        if (isset($page[0]) && (int)$page[0]) {
            $model->setCurrentOffset((int)$page[0]);
        }

        if (isset($page[1]) && (int) $page[1]) {
            $model->setPerPageLimit((int)$page[1]);
        }

        if($order) {
            $model->setOrder($order);
        }

        if ($longTypes) {
            $model->setLongTypes($longTypes);
        }

        if ($subjectIds) {
            $model = $model->whereIn($primaryKey, $subjectIds);
        }

        if (count($subjectIds) == 1) {
            return $model->with('video')->where(Subject::STATUS_FIELD, Subject::VALID_STATUS)->get()->toArray();
        } else {
            $data = $model->where(Subject::STATUS_FIELD, Subject::VALID_STATUS)->get();
            $data->each(function ($subject) {
                $subject->load('video');
            });
            return $data->toArray();
        }
    }

    public static function getByTag(array $tagIds, ?array $longTypes = null, array $page = null): array
    {
        $videoModel = new Video();

        if (empty($tagIds)) {
            if (isset($page[0]) && $page[0]) {
                $videoModel->offset($page[0]);
            }

            if (isset($page[1]) && $page[1]) {
                $videoModel->limit($page[1]);
            }

            return $videoModel->get()->toArray();
        }

        $tagModel = new Tag;
        $tags = $tagModel->whereIn($tagModel->getPrimaryKey(), $tagIds)->select($tagModel->getPrimaryKey())->get()->toArray();

        $tagIds = [];
        foreach ($tags as $tag) {
            $tagIds[] = $tag['id'];
        }

        return ServiceCaller::call(
            ServiceCaller::TASK_SERVICE,
                    new SearchVideos(0, implode(',', $tagIds), $longTypes, isset($page[0])? (int)$page[0]:0, isset($page[1]) ? (int)$page[1]: 0)
                );
    }
}