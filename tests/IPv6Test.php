<?php

namespace App\tests;

use Halo123450\Zxipdb\IPv6Tool;
use Halo123450\Zxipdb\RuntimeException;

class IPv6Test
{
    protected function assertEquals()
    {
        $eol = ['', PHP_EOL];
        foreach (func_get_args() as $argument) {
            print($eol[0]);
            print_r(is_array($argument) ? json_encode($argument, JSON_UNESCAPED_UNICODE + JSON_UNESCAPED_SLASHES + JSON_PRETTY_PRINT) : $argument);
            print($eol[1]);
        }
    }

    public function testIpv4Total()
    {
        $this->assertEquals(0, IPv6Tool::total());
    }

    public function testQuery()
    {
        $arr = IPv6Tool::query('FFFF:FFFF:FFFF:FFFF::');
        $this->assertEquals('ffff:ffff:ffff:fff0::', $arr['start']);
        $this->assertEquals('ffff:ffff:ffff:ffff::', $arr['end']);
        $this->assertEquals('', $arr['addr'][0]);
        $this->assertEquals("ZX公网IPv6库\t20210726版", $arr['addr'][1]);
        try {
            IPv6Tool::query('2409::e7ef::76c9');
        } catch (\Exception$exception) {
            $this->assertEquals(RuntimeException::class, get_class($exception));
        }
    }

    public function testValidator()
    {
        $this->assertEquals(false, IPv6Tool::isValidAddress('1.1.1.1'));
        $this->assertEquals(false, IPv6Tool::isValidAddress('2.2.2.2'));
        $this->assertEquals(false, IPv6Tool::isValidAddress('0.0.0.0'));
        $this->assertEquals(false, IPv6Tool::isValidAddress('1.323.32.1'));
        $this->assertEquals(true, IPv6Tool::isValidAddress('::1'));
        $this->assertEquals(true, IPv6Tool::isValidAddress('2409:8954:48f0:3a01:b12b:5ea9:e7ef:76c9'));
        $this->assertEquals(false, IPv6Tool::isValidAddress('2409:8954:48f0:3a01:b12b:5ea9::e7ef:76c9'));
        $this->assertEquals(false, IPv6Tool::isValidAddress('2409::e7ef::76c9'));
        $this->assertEquals(true, IPv6Tool::isValidAddress('2409:8954::1'));
        $this->assertEquals(true, IPv6Tool::isValidAddress('2409:8954::'));
    }
}
