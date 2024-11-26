<?php

namespace App\Services;

class Count
{
    public function getOnesRev2($num) {
        $cnt = 0;
        while ($num > 0) {
            $cnt++;
            $num &= ($num - 1);
        }
        return $cnt;
    }
    public function getOnesRev1($num)
    {
        $cnt = 0;
        while ($num > 0) {
            if (($num & 0X01) > 0) {
                $cnt++;
            }
            $num = $num >> 1;
        }
        return $cnt;

    }

}