<?php

namespace App\Services;

class Hundreds implements IntegerConverterInterface
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
        $c = ['', 'C', 'CC', 'CCC', 'CD', 'D', 'DC', 'DCC', 'DCCC', 'CM'];
        $hundreds = $c[($integer % 1000) / 100];
        return $this->output = $hundreds;
    }

}
