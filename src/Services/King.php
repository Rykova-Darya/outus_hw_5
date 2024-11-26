<?php

namespace App\Services;

class King extends Bitboard
{
    public function steps()
    {
        $mask =  $this->bb >> 1;

        if (!$this->leftBorder) {
            $mask |= $this->bb >> 9;
            $mask |= $this->bb << 7;
        }

        $mask |= ($this->bb & 0x7F7F7F7F7F7F7F7F) << 1;
        $mask |= ($this->bb & 0xFEFEFEFEFEFEFEFE) >> 1;
        $mask |= ($this->bb << 8);
        $mask |= ($this->bb >> 8);
        $mask |= ($this->bb & 0xFEFEFEFEFEFEFEFE) >> 9;
        $mask |= ($this->bb & 0xFEFEFEFEFEFEFEFE) << 7;
        $mask |= ($this->bb & 0x7F7F7F7F7F7F7F7F) << 9;
        $mask |= ($this->bb & 0x7F7F7F7F7F7F7F7F) >> 7;
        $this->bb = $mask;

    }

}