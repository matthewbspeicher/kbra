<?php

require_once './clockBellCounter.php';

class ClockTest extends PHPUnit\Framework\TestCase {

    public function setUp () {
        $this->teen = new Clock();
    }

    public function test1 () {
        $this->assertEquals(5, $this->teen->countBells('2:00', '3:00'));
    }

    public function test2 () {
        $this->assertEquals(5, $this->teen->countBells('14:00', '15:00'));
    }

    public function test3 () {
        $this->assertEquals(3, $this->teen->countBells('14:23', '15:42'));
    }

    public function test4 () {
        $this->assertEquals(24, $this->teen->countBells('23:00', '1:00'));
    }

    public function test5 () {
        $this->assertEquals(157, $this->teen->countBells('1:00', '1:00'));
    }

    public function test6 () {
        $this->assertEquals(155, $this->teen->countBells('1:10', '1:10'));
    }

    public function test7 () {
        $this->assertEquals(168, $this->teen->countBells('12:00', '12:00'));
    }

    public function test8 () {
        $this->assertEquals(144, $this->teen->countBells('12:10', '12:10'));
    }

}
