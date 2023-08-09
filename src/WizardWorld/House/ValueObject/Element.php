<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class Element
{
    private string $element;

    /**
     * @throws Exception
     */
    private function __construct(string $element)
    {
        $this->ensureThatElementIsNotEmpty($element);
        $this->element = $element;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $element): self
    {
        return new self($element);
    }

    /**
     * @throws Exception
     */
    private function ensureThatElementIsNotEmpty($element): void
    {
        if ($element === '')
        {
            throw new Exception('Element can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->element;
    }
}