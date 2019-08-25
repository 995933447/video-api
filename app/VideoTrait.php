<?php
namespace App;

trait VideoTrait
{
    protected static $longTypes;

    public function setLongTypes(array $longTypes)
    {
        static::$longTypes = $longTypes;
    }

    public function getLongTypes(): ?array
    {
        return static::$longTypes;
    }
}