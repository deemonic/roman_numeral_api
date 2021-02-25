<?php

namespace App\Services;

class Tens implements IntegerConverterInterface
{
    /**
     * @var string
     */
    public string $output;

    /**
     * @param int $integer
     * @return string
     */
    public function convertInteger(int $integer): string
    {
        $x = ['', 'X', 'XX', 'XXX', 'XL', 'L', 'LX', 'LXX', 'LXXX', 'XC'];
        $tens = $x[($integer % 100) / 10];
        return $this->output = $tens;
    }
}
