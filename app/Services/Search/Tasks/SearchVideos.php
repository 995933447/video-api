<?php
namespace App\Services\Search\Tasks;

use App\Services\TaskContract;
use App\App;
use App\Video;

class SearchVideos implements TaskContract
{
    private $appId;
    private $keyword;
    private $offset = 0;
    private $limit = 30;
    private $longTypes;

    public function __construct(int $appId, ?string $keyword, ?array $longTypes, int $offset, int $limit)
    {
        $this->appId = $appId;
        $this->keyword = $keyword;
        $this->offset = $offset;
        $this->longTypes = $longTypes;
        if ($limit) $this->limit = $limit;
    }

    public function run()
    {
        $video = new Video();

        if($this->keyword) {
            $ids = Video::search($this->keyword)->raw()['ids'];
            $video = $video->whereIn($video->getPrimaryKey(), $ids);
        }

        if ($this->appId) {
            $appLimitCond = App::with(['category', 'subject'])->get();
            $categoryIds = [];
            $subjectIds = [];

            foreach ($appLimitCond as $item) {
               foreach ($item->category as $category) {
                   $categoryIds[] = $category->id;
               }
               foreach ($item->subject as $subject) {
                   $subjectIds[] = $subject->id;
               }
            }

            if ($categoryIds)  $video = $video->whereIn(Video::CATEGORY_ID_FIELD, $categoryIds);
            if ($subjectIds)  $video = $video->whereIn(Video::SUBJECT_ID_FIELD, $subjectIds);
        }

        if ($this->longTypes) {
            $video->whereIn(Video::LONG_TYPE_FIELD, $this->longTypes);
        }

        return $video->where(Video::STATUS_FIELD, Video::VALID_STATUS)->offset($this->offset)->limit($this->limit)->orderBy(Video::SEE_NUM_FIELD, 'desc')->get()->toArray();
    }
}