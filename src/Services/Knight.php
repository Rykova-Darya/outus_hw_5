<?php

namespace App\Services;

class Knight extends Bitboard
{
    private const NA  = 0xFeFeFeFeFeFeFeFe;
    private const NAB = 0xFcFcFcFcFcFcFcFc;
    private const NH = 0x7f7f7f7f7f7f7f7f;
    private const NGH = 0x3f3f3f3f3f3f3f3f;
    public function steps()
    {

        $mask = self::NGH & ($this->bb << 6 | $this->bb >> 10);
        $mask |= self::NH & ($this->bb << 15 | $this->bb >> 17);
        $mask |= self::NA & ($this->bb << 17 | $this->bb >> 15);


        if ($this->leftBorder) {
            $mask |= ($this->bb << 10 | $this->bb >> 6);
        }
        else {
            $mask |= self::NAB & ($this->bb << 10 | $this->bb >> 6);
        }

        $this->bb = $mask;

    }
}
