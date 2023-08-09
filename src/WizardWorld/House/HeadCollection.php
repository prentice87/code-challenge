<?php
declare(strict_types=1);

namespace App\WizardWorld\House;

class HeadCollection
{
    /*** @var Head[] $heads */
    private array $heads = [];
    private int $count = 0;

    public function add(Head $item): void
    {
        $this->heads[] = $item;
        $this->count++;
    }

    public function count(): int
    {
        return $this->count;
    }

    public function all(): array
    {
        return $this->heads;
    }
}