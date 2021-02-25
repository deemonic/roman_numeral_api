<?php

namespace App\Services;

class Thousands implements IntegerConverterInterface
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
        $m = ['', 'M', 'MM', 'MMM'];
        $thousands = $m[$integer / 1000];
        return $this->output = $thousands;
    }

}
