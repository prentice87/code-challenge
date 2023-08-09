<?php
declare(strict_types=1);

namespace App\WizardWorld\House;

use Exception;

class TraitCollection
{
    /*** @var HouseTrait[] $traits */
    private array $traits = [];
    private int $count = 0;

    /**
     * @throws Exception
     */
    public function add(HouseTrait $item): void
    {
        try {
            $this->assureNoDoubles($item);
            $this->traits[] = $item;
            $this->count++;
        } catch(Exception $e) {
            return;
        }
    }

    /**
     * @throws Exception
     */
    private function assureNoDoubles(HouseTrait $item): void
    {
        foreach ($this->traits as $trait)
        {
            if($trait->getName()->asString() == $item->getName()->asString())
                throw new Exception('Trait is already in Collection');
        }
    }

    /**
     * @throws Exception
     */
    public static function createFromArray(array $traits): self
    {
        $collection = new self();

        foreach ($traits as $trait)
        {
            $collection->add($trait);
        }

        return $collection;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function all(): array
    {
        return $this->traits;
    }
}