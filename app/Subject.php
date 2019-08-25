<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends  Model
{
    use BaseTrait;
    use VideoTrait;

    const CATEGORY_ID_FIELD = 'category_id';
    const STATUS_FIELD = 'status';

    const VALID_STATUS = 1;

    public function video()
    {
        $related =  $this->hasMany(Video::class,Video::SUBJECT_ID_FIELD, $this->primaryKey)
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

        if (!$order = $this->getOrder()) {
            $related->inRandomOrder();
        } else {
            $related->order(...$order);
        }

        return $related;
    }
}