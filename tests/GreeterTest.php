<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class GreeterTest extends TestCase
{
    public function testGreetsWithName(): void
    {
        $greeter = new Greeter();
        $greeting = $greeter->greet('Alice');
        $this->assertSame('Hello, Alice!', $greeting);
    }

    #[DataProvider('nameProvider')]
    public function testGreetsEachName(string $name, string $expected): void
    {
        $greeter = new Greeter();
        $this->assertSame($expected, $greeter->greet($name));
    }

    public static function nameProvider(): array
    {
        return [
            'nama pendek'       => ['Ani', 'Hello, Ani!'],
            'nama dengan spasi' => ['Siti Aminah', 'Hello, Siti Aminah!'],
            'huruf kecil'       => ['dedi', 'Hello, dedi!'],
            'spasi di tepi' => ['  dedi  ', 'Hello,   dedi  !'],
        ];
    }
}