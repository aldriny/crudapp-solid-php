<?php

namespace OnlineShop\Classes;


class Factory
{
    public static function create(string $class, string $operation, ...$params)
    {
        $className = "OnlineShop\\Classes\\" . ucfirst(strtolower($class)) . "\\" . ucfirst(strtolower($operation));

        if (class_exists($className)) {
            return new $className(...$params);
        }

        throw new \Exception("Class $className does not exist.");
    }
}
