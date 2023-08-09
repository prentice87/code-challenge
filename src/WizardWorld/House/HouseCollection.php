<?php
declare(strict_types=1);

namespace App\WizardWorld\House;

use Exception;

class HouseCollection
{
    /*** @var House[] $houses */
    private array $houses = [];
    private int $count = 0;

    public function add(House $item): void
    {
        $this->houses[] = $item;
        $this->count++;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function all(): array
    {
        return $this->houses;
    }

    /**
     * @throws Exception
     */
    public function getAllTraitsCollection(): TraitCollection
    {
        $traits = [];

        foreach ($this->houses as $house)
        {
            $traits = array_merge($traits, $house->getTraitCollection()->all());
        }

        return TraitCollection::createFromArray($traits);
    }
}