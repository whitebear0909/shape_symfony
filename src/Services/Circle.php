<?php

namespace App\Services;

class Circle  extends ShapeService implements GetType, GetAttributes
{

    public function __construct()
    {
    }

    public function setAttributes($a_or_radius, $b, $c){
        $this->a_or_radius = $a_or_radius;
        $this->b = $b;
        $this->c = $c;
    }

    public function getType(): string
    {
        return "circle";
    }

    public function getAttributes(): array
    {
        return [
            "radius" => $this->a_or_radius,
        ];
    }

    public function calculateCircumference(): float|int
    {
        return $this->a_or_radius * 2 * pi();
    }

    public function calculateArea(): float|int
    {
        return pi() * ($this->a_or_radius * $this->a_or_radius);
    }
}