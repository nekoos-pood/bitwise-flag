<?php


namespace NekoOs\Pood\Support;

class BitwiseFlag
{

    /**
     * Check bit is flagged
     *
     * @param int $flag
     * @param int $bit
     *
     * @return bool
     */
    public static function match(int $flag, int $bit): bool
    {
        return ($bit & $flag) == $bit;
    }

    public static function set(int &$flag, int $bit, bool $value)
    {
        if ($value) {
            $flag |= $bit;
        } else {
            $flag &= ~$bit;
        }
    }
}
