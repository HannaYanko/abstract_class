<?php

abstract class Figure
{
    abstract public function area();
    abstract public function perimeter();
}

class Rectangle extends Figure
{
    public $length; public $width;

    public function __construct($length, $width)
    {
        if ($length <= 0 or $width <= 0) {
            throw new Exception('Обчислення неможливе');
        }
        $this->length = $length;
        $this->width = $width;
    }

    public function area(): float
    {
        return $this->length * $this->width;
    }

    public function perimeter(): float
    {
        return ($this->length + $this->width) * 2;
    }
}

class Circle extends Figure
{
    public $radius;

    public function __construct($radius)
    {
        if ($radius <= 0) {
            throw new Exception('Обчислення неможливе');
        }
        $this->radius = $radius;
    }

    public function area(): float
    {
        return pi() * pow($this->radius, 2);
    }

    public function perimeter(): float
    {
        return 2 * pi() * $this->radius;
    }
}

try {
    $rectangle = new Rectangle(3, 10);
    echo "Прямокутник: 
    Довжина = {$rectangle->length}, 
    Ширина = {$rectangle->width}, 
    Площа = {$rectangle->area()}, 
    Периметр = {$rectangle->perimeter()}" . PHP_EOL;
} catch (Exception $i) {
    echo "Обчислення неможливе: {$i->getMessage()}" . PHP_EOL;
}

try {
    $circle = new Circle(7);
    echo "Коло: 
    Радіус = {$circle->radius}, 
    Площа = {$circle->area()}, 
    Периметр = {$circle->perimeter()}" . PHP_EOL;
} catch (Exception $i) {
    echo "Обчислення неможливе: {$i->getMessage()}" . PHP_EOL;
}
