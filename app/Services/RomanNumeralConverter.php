<?php

namespace App\Services;

use App\Services\Thousands;
use App\Services\Hundreds;
use App\Services\Tens;
use App\Services\Ones;

class RomanNumeralConverter
{
    private array $expressions;
    private array $output = [];
    public string $result;

    /**
     * RomanNumeralParser constructor.
     */
    public function __construct()
    {
        $this->expressions = [
            new Thousands(),
            new Hundreds(),
            new Tens(),
            new Ones(),
        ];

    }

    /**
     * @param int $integer
     * @return string
     */
    public function convertInteger(int $integer): string
    {
        foreach ($this->expressions as $expression)
        {
            $value = $expression->convertInteger($integer);

            array_push($this->output, $value);
        }

        return $this->result = implode('',$this->output);

    }
}
