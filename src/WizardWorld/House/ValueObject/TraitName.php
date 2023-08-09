<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class TraitName
{
    private string $traitName;

    /**
     * @throws Exception
     */
    private function __construct(string $traitName)
    {
        $this->ensureThatTraitNameIsNotEmpty($traitName);
        $this->traitName = $traitName;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $traitName): self
    {
        return new self($traitName);
    }

    /**
     * @throws Exception
     */
    private function ensureThatTraitNameIsNotEmpty($traitName): void
    {
        if ($traitName === '')
        {
            throw new Exception('TraitName can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->traitName;
    }
}