<?php

namespace App\Services;

class Triangle extends ShapeService implements GetType, GetAttributes
{
    public $a_or_radius;
    public $b;
    public $c;

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
        return "triangle";
    }

    public function getAttributes(): array
    {
        return [
            "a" => $this->a_or_radius,
            "b" => $this->b,
            "c" => $this->c,
        ];
    }

    public function calculateArea(): float|int
    {
        return ($this->a_or_radius * $this->b)/2;
    }

    public function calculateCircumference(): float|int
    {
        return $this->a_or_radius + $this->b + $this->c;
    }
}