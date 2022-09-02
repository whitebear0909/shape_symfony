<?php

namespace App\Services;

use Exception;

abstract class ShapeService implements Shape
{

    /**
     * @throws Exception
     */
    public static function getInstance(string $shape): object
    {
        return match ($shape) {
            "triangle" => new Triangle(),
            "circle" => new Circle(),
            default => throw new Exception("Shape type is not valid"),
        };
    }

    /**
     * @throws Exception
     */
    public function circumference(): float
    {
        return $this->calculateCircumference();
    }

    /**
     * @throws Exception
     */
    public function surface(): float
    {
        return $this->calculateArea();
    }

    abstract public function setAttributes($a_or_radius, $b, $c);
    
    abstract public function calculateArea(): float|int;

    abstract public function calculateCircumference(): float|int;
}