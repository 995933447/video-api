<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use BaseTrait;
    use VideoTrait;

    const STATUS_FIELD = 'status';
    const VALID_STATUS = 1;

    const PRIMARY_ID_FIELD = 'id';
    const PLAY_NUM_FIELD = 'play_num';

    public function video()
    {
        $related = $this->hasMany(Video::class,Video::CATEGORY_ID_FIELD, $this->primaryKey)
            ->where(Video::STATUS_FIELD, Video::VALID_STATUS);

        if ($longTypes = $this->getLongTypes()) {
            $related->where(Video::LONG_TYPE_FIELD, $longTypes);
        }

        if ($offset = $this->getCurrentOffset()) {
            $related->offset($offset);
        }

        if ($limit = $this->getPerPageLimit()) {
            $related->limit($limit);
        }

        if ($order = $this->getOrder()) {
            $related->orderBy(...$order);
        } else {
            $related->inRandomOrder();
        }

        return $related;
    }

    public function subject()
    {
        return $this->hasMany(Subject::class, Subject::CATEGORY_ID_FIELD, $this->primaryKey)->where(Subject::STATUS_FIELD, Subject::VALID_STATUS);
    }
}