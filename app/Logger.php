<?php

namespace App;

use stdClass;
use App\Factory\Func;

class Logger
{
    static function info(string $title, $o = null, $oo = null)
    {

        $data = "|\033[32m info:\033[0m =====================================================" . PHP_EOL;
        $data .=  $title;
        if ($o instanceof stdClass || is_array($o)) $data .= json_encode($o);
        else if (isset($o)) $data .= print_r($o, true);
        if (isset($oo)) $data .= print_r($oo, true);
        $data .= PHP_EOL . "============================================================|" . PHP_EOL;
        Func::pretty_log($data);
    }
    static function warning(string $title, $o = null, $oo = null)
    {


        $data = "|\033[33m warning:\033[0m ==================================================" . PHP_EOL;
        $data .= $title;
        if ($o instanceof stdClass || is_array($o)) $data .= json_encode($o);
        else if (isset($o)) $data .= print_r($o, true);
        if (isset($oo)) $data .= print_r($oo, true);
        $data .= PHP_EOL . "============================================================|" . PHP_EOL;
        Func::pretty_log($data);
    }
    static function error(string $title, $o = null, $oo = null)
    {

        $data = "|\033[31m error:\033[0m ====================================================" . PHP_EOL;
        $data .= $title;
        if ($o instanceof stdClass || is_array($o)) $data .= json_encode($o);
        else if (isset($o)) $data .= print_r($o, true);
        if (isset($oo)) $data .= print_r($oo, true);
        $data .= PHP_EOL . "============================================================|" . PHP_EOL;
        Func::pretty_log($data);
    }
}
