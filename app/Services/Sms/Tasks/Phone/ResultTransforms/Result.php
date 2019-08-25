<?php
namespace App\Services\Sms\Tasks\Phone\ResultTransforms;

class Result
{
    private $ok;
    private $error;

    public function __construct(bool $ok, ?string $error)
    {
        $this->ok = $ok;
        $this->error = $error;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}