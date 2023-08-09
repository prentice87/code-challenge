<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class Founder
{
    private string $founder;

    /**
     * @throws Exception
     */
    private function __construct(string $founder)
    {
        $this->ensureThatFounderIsNotEmpty($founder);
        $this->founder = $founder;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $founder): self
    {
        return new self($founder);
    }

    /**
     * @throws Exception
     */
    private function ensureThatFounderIsNotEmpty($founder): void
    {
        if ($founder === '')
        {
            throw new Exception('Founder can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->founder;
    }
}