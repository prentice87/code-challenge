<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class Ghost
{
    private string $ghost;

    /**
     * @throws Exception
     */
    private function __construct(string $ghost)
    {
        $this->ensureThatGhostIsNotEmpty($ghost);
        $this->ghost = $ghost;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $ghost): self
    {
        return new self($ghost);
    }

    /**
     * @throws Exception
     */
    private function ensureThatGhostIsNotEmpty($ghost): void
    {
        if ($ghost === '')
        {
            throw new Exception('Ghost can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->ghost;
    }
}