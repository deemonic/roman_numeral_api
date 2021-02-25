<?php

namespace App\Services;

class Ones implements IntegerConverterInterface
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
        $i = ['', 'I', 'II', 'III', 'IV', 'V', 'VI', 'VII', 'VIII', 'IX'];
        $ones = $i[$integer % 10];
        return $this->output = $ones;
    }
}
