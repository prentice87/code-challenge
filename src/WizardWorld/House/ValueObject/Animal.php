<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class Animal
{
    private string $animal;

    /**
     * @throws Exception
     */
    private function __construct(string $animal)
    {
        $this->ensureThatAnimalIsNotEmpty($animal);
        $this->animal = $animal;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $animal): self
    {
        return new self($animal);
    }

    /**
     * @throws Exception
     */
    private function ensureThatAnimalIsNotEmpty($animal): void
    {
        if ($animal === '')
        {
            throw new Exception('Animal can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->animal;
    }
}