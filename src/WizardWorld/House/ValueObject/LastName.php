<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class LastName
{
    private string $lastName;

    /**
     * @throws Exception
     */
    private function __construct(string $lastName)
    {
        $this->ensureThatLastNameIsNotEmpty($lastName);
        $this->lastName = $lastName;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $lastName): self
    {
        return new self($lastName);
    }

    /**
     * @throws Exception
     */
    private function ensureThatLastNameIsNotEmpty($lastName): void
    {
        if ($lastName === '')
        {
            throw new Exception('LastName can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->lastName;
    }
}