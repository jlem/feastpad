<?php

namespace App\Enums;

class UnitOfMeasure
{
    const TEASPOON = 1;
    const TABLESPOON = 2;
    const CUP = 3;
    const FLUID_OUNCE = 4;
    const PINT = 5;
    const QUART = 6;
    const MILLILITER = 7;
    const LITER = 8;
    const POUND = 9;
    const OUNCE = 10;

    private $unit;

    public function __construct($unit)
    {
        $this->unit = $unit;
    }

    public static function toArray()
    {
        return [
            'tsp' => self::TEASPOON,
            'tbsp' => self::TABLESPOON,
            'cup' => self::CUP,
            'fl oz' => self::FLUID_OUNCE,
            'pint' => self::PINT,
            'quart' => self::QUART,
            'mL' => self::MILLILITER,
            'L' => self::LITER,
            'lb' => self::POUND,
            'oz' => self::OUNCE
        ];
    }

    public function toString()
    {
        return array_flip(static::toArray())[$this->unit];
    }
}
