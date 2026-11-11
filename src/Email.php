<?php declare(strict_types=1);

final class Email
{
    private function __construct(private string $address) {}

    public static function fromString(string $address): self
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("\"$address\" bukan alamat email yang valid");
        }
        return new self($address);
    }

    public function asString(): string
    {
        return $this->address;
    }
}