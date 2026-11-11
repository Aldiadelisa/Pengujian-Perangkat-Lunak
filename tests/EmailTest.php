<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

final class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmail(): void
    {
        $address = 'user@example.com';

        $email = Email::fromString($address);

        $this->assertInstanceOf(Email::class, $email);
        $this->assertSame($address, $email->asString());
        $this->assertStringContainsString('@', $email->asString());
    }

    #[DataProvider('validEmailProvider')]
    public function testCanBeCreatedFromVariousValidEmails(string $address): void
    {
        // Arrange & Act
        $email = Email::fromString($address);

        // Assert
        $this->assertInstanceOf(Email::class, $email);
        $this->assertSame($address, $email->asString());
    }

    // Data provider dengan minimal 4 variasi email valid
    public static function validEmailProvider(): array
    {
        return [
            'email dengan titik di nama' => ['nama.depan@example.com'],
            'email dengan angka'         => ['user123@example.com'],
            'email dengan subdomain'     => ['admin@mail.sub.example.com'],
            'email dengan tanda plus'    => ['user+filter@example.com'],
        ];
    }
}