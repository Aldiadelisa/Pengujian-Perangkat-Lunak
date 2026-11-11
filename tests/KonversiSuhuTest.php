<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class KonversiSuhuTest extends TestCase
{
    #[DataProvider('suhuProvider')]
    public function testCelsiusKeFahrenheit(float $celsius, float $expectedF): void
    {
        $konversi = new KonversiSuhu();
        // Gunakan delta 0.001 untuk presisi float/decimal
        $this->assertEqualsWithDelta($expectedF, $konversi->celsiusKeFahrenheit($celsius), 0.001);
    }

    #[DataProvider('suhuProviderKelvin')]
    public function testCelsiusKeKelvin(float $celsius, float $expectedK): void
    {
        $konversi = new KonversiSuhu();
        $this->assertEqualsWithDelta($expectedK, $konversi->celsiusKeKelvin($celsius), 0.001);
    }

    public static function suhuProvider(): array
    {
        return [
            'titik beku'   => [0.0, 32.0],
            'titik didih'  => [100.0, 212.0],
            'suhu negatif' => [-10.0, 14.0],
            'suhu tubuh'   => [36.6, 97.88],
        ];
    }

    public static function suhuProviderKelvin(): array
    {
        return [
            'titik beku'   => [0.0, 273.15],
            'titik didih'  => [100.0, 373.15],
            'suhu negatif' => [-273.15, 0.0],
            'suhu tubuh'   => [36.6, 309.75],
        ];
    }
}