<?php

use NekoOs\Pood\Support\BitwiseFlag;
use PHPUnit\Framework\TestCase;

class BitwiseFlagTest extends TestCase
{

    /**
     * @return array
     */
    public function dataProviderForSet()
    {
        return [
            [0, 0, true, 0],
            [0, 1, true, 1],
            [1, 4, true, 5],
            [5, 4, true, 5],
            [1024, 256, true, 1280],
            [1280, 256, false, 1024],
            [5, 4, false, 1],
            [1024, 1024, false, 0],
        ];
    }

    /**
     * @return array
     */
    public function dataProviderForMatch()
    {
        return [
            [0, 0, true],
            [1024, 256, false],
            [1280, 256, true],
        ];
    }

    /**
     * @dataProvider dataProviderForSet
     *
     * @param int  $flags
     * @param int  $bit
     * @param bool $value
     * @param int  $expected
     */
    public function testSet(int $flags, int $bit, bool $value, int $expected)
    {
        BitwiseFlag::set($flags, $bit, $value);
        $this->assertEquals($expected, $flags);
    }

    /**
     * @dataProvider dataProviderForMatch
     *
     * @param int  $flags
     * @param int  $bit
     * @param bool $expected
     */
    public function testMatch(int $flags, int $bit, bool $expected)
    {
        $value = BitwiseFlag::match($flags, $bit);
        $this->assertEquals($expected, $value);
    }
}
