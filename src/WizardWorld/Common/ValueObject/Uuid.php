<?php
declare(strict_types=1);

namespace App\WizardWorld\Common\ValueObject;

use Exception;

class Uuid
{
    private string $uuid;

    /**
     * @throws Exception
     */
    private function __construct(string $uuid)
    {
        $this->ensureThatUuidIsNotEmpty($uuid);
        $this->uuid = $uuid;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $uuid): self
    {
        return new self($uuid);
    }

    /**
     * @throws Exception
     */
    private function ensureThatUuidIsNotEmpty($uuid): void
    {
        if ($uuid === '')
            throw new Exception('Uuid can not be empty');
    }

    public function asString(): string
    {
        return $this->uuid;
    }
}