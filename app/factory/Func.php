<?php

namespace App\Factory;

class Func
{
    static function pretty_log(string $string = null, $object = null)
    {

        if (\is_object($object) || is_array($object)) {
            $object = \json_encode($object);
        } elseif (!is_null($object) && !\is_null($string)) {
            $string .= $object;
            $object = null;
        }
        if (!\is_null($string))
            \file_put_contents(__DIR__ . "/../../logs", $string, FILE_APPEND);
        if (!\is_null($object))
            \file_put_contents(__DIR__ . "/../../logs", $object, FILE_APPEND);

        \file_put_contents(__DIR__ . "/../../logs", PHP_EOL, FILE_APPEND);
    }
    static function camelCase(string $str = "")
    {
        return lcfirst(implode("", array_map(fn ($s) => ucfirst($s), \preg_split("/-|\s|_/", strtolower($str)))));
    }
}
