<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class FirstName
{
    private string $firstName;

    /**
     * @throws Exception
     */
    private function __construct(string $firstName)
    {
        $this->ensureThatFirstNameIsNotEmpty($firstName);
        $this->firstName = $firstName;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $firstName): self
    {
        return new self($firstName);
    }

    /**
     * @throws Exception
     */
    private function ensureThatFirstNameIsNotEmpty($firstName): void
    {
        if ($firstName === '')
        {
            throw new Exception('FirstName can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->firstName;
    }
}