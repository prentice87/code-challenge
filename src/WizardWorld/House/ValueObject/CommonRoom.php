<?php
declare(strict_types=1);

namespace App\WizardWorld\House\ValueObject;

use Exception;

class CommonRoom
{
    private string $room;

    /**
     * @throws Exception
     */
    private function __construct(string $room)
    {
        $this->ensureThatRoomIsNotEmpty($room);
        $this->room = $room;
    }

    /**
     * @throws Exception
     */
    public static function createFromString(string $room): self
    {
        return new self($room);
    }

    /**
     * @throws Exception
     */
    private function ensureThatRoomIsNotEmpty($room): void
    {
        if ($room === '')
        {
            throw new Exception('Room can not be empty');
        }
    }

    public function asString(): string
    {
        return $this->room;
    }
}