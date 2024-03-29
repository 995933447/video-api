<?php
namespace App\Tools\Singleton;

trait SingletonTrait
{
    private static $instance;

    public static function instance()
    {
        if (!static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function __callStatic(string $methodName, array $arguments)
    {
        return static::instance()->$methodName(...$arguments);
    }

    public function __call(string $methodName, array $arguments)
    {
        if (method_exists($this, $methodName))
            return $this->methodName(...$arguments);
        throw New \BadMethodCallException($methodName + "is not exist.");
    }
}