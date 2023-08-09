<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class Name
{
    private string $name;

    /**
     * @throws Exception
     */
    private function __construct(string $name)
    {
        $this->ensureThatNameIsNotEmpty($name);
        $this->name = $name;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $name): self
    {
        return new self($name);
    }

    /**
     * @throws Exception
     */
    private function ensureThatNameIsNotEmpty($name): void
    {
        if ($name === '')
        {
            throw new Exception('Name can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->name;
    }
}