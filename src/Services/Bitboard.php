<?php

namespace App\Services;

class Bitboard
{
    protected $bb = 0;
    protected $leftBorder = false;
    protected $rightBorder = false;

    public function __construct($input)
    {
        $this->isLeftBoard($input);
        $this->isRightBoard($input);
        if (is_numeric($input)) {
            $this->bb = 1 << (int)$input;
        } else {
            $input = strtoupper($input);
            try {
                $point = (ord($input[0]) - ord('A')) + (intval($input[1]) - 1) * 8;
                $this->bb = 1 << $point;
            } catch (\Exception $exception) {
                echo "Error: " . $exception->getMessage();
                return;
            }
        }
    }

    public function printBoard($row = 0)
    {
        echo str_repeat(PHP_EOL, $row);
        $color = false;

        for ($i = 8; $i > 0; $i--) {
            echo "{$i}: ";

            for ($j = 0; $j < 8; $j++) {
                if (($this->bb & (1 << (($i - 1) * 8 + $j))) > 0) {
                    echo "[X] ";
                } else {
                    echo $color ? "[ ] " : "[ ] ";
                }
                $color = !$color;
            }
            $color = !$color;
            echo PHP_EOL;
        }

        echo "   ";
        for ($i = 0; $i < 8; $i++) {
            echo chr(ord('A') + $i) . "   ";
        }
        echo PHP_EOL;
    }

    private function isLeftBoard($position) {
        $position = strtoupper($position);
        if ($position[0] == ord('A') ||
            $position == 0 || $position == 8 || $position == 16 || $position == 24 ||
            $position == 32 || $position == 40 || $position == 48 || $position == 56 ) {
            $this->leftBorder = true;
        }
    }

    private function isRightBoard($position) {
        $position = strtoupper($position);
        if ($position[0] == ord('H') ||
            $position == 7 || $position == 15 || $position == 23 || $position == 31 ||
            $position == 39 || $position == 47 || $position == 55 || $position == 63 ) {
            $this->rightBorder = true;
        }
    }
}