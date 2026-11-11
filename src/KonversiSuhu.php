<?php declare(strict_types=1);

final class KonversiSuhu
{
    public function celsiusKeFahrenheit(float $c): float
    {
        return $c * 9/5 + 32;
    }

    public function celsiusKeKelvin(float $c): float
    {
        return $c + 273.15;
    }
}