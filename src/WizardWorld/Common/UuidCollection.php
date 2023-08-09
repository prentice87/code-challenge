<?php
declare(strict_types=1);

namespace App\WizardWorld\Common;

use App\WizardWorld\Common\ValueObject\Uuid;
use Exception;

class UuidCollection
{
    /*** @var Uuid[] $Uuid */
    private array $uuids = [];
    private int $count = 0;

    public function add(Uuid $item): void
    {
        $this->uuids[] = $item;
        $this->count++;
    }

    /**
     * @throws Exception
     */
    public static function createFromRequestPostArray(array $items): self
    {
        $new = new self();

        foreach ($items as $item)
        {
            $new->add(Uuid::createFromString($item));
        }

        return $new;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function all(): array
    {
        return $this->uuids;
    }

    public function has(Uuid $uuid): bool
    {
        foreach ($this->uuids as $id)
        {
            if($id->asString() == $uuid->asString())
                return true;
        }

        return false;
    }
}