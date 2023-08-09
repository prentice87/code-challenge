<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class Colour
{
    private string $colour;

    /**
     * @throws Exception
     */
    private function __construct(string $colour)
    {
        $this->ensureThatColourIsNotEmpty($colour);
        $this->colour = $colour;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $colour): self
    {
        return new self($colour);
    }

    /**
     * @throws Exception
     */
    private function ensureThatColourIsNotEmpty($colour): void
    {
        if ($colour === '')
        {
            throw new Exception('Colour can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->colour;
    }
}