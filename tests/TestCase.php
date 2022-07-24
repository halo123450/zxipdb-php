<?php

namespace App\tests;

class TestCase
{
    public function __construct()
    {

    }

    protected function assertEquals()
    {
        $eol = ['', PHP_EOL];
        foreach (func_get_args() as $argument) {
            print($eol[0]);
            print_r(is_array($argument) ? json_encode($argument, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES + JSON_PRETTY_PRINT) : $argument);
            print($eol[1]);
        }
    }
}
