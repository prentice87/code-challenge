<?php
declare(strict_types=1);

namespace App\WizardWorld\House;

use App\WizardWorld\Common\ValueObject\Uuid;
use App\WizardWorld\House\ValueObject\Animal;
use App\WizardWorld\House\ValueObject\Colour;
use App\WizardWorld\House\ValueObject\CommonRoom;
use App\WizardWorld\House\ValueObject\Element;
use App\WizardWorld\House\ValueObject\Founder;
use App\WizardWorld\House\ValueObject\Ghost;
use App\WizardWorld\House\ValueObject\Name;
use Exception;

class House
{
    public function __construct(
        private readonly Uuid $uuid,
        private readonly Name $name,
        private readonly Colour $colour,
        private readonly Founder $founder,
        private readonly Animal $animal,
        private readonly Element $element,
        private readonly Ghost $ghost,
        private readonly CommonRoom $commonRoom,
        private readonly HeadCollection $headCollection,
        private readonly TraitCollection $traitCollection
    ){}

    /**
     * @throws Exception
     */
    public static function create(
        string $uuid,
        string $name,
        string $colour,
        string $founder,
        string $animal,
        string $element,
        string $ghost,
        string $commonRoom,
        array $heads,
        array $traits
    ): self
    {
        $headCollection = new HeadCollection();
        foreach ($heads as $head)
        {
            $headCollection->add(
                Head::create(
                    $head['firstName'],
                    $head['lastName']
                )
            );
        }

        $traitCollection = new TraitCollection();
        foreach ($traits as $trait)
        {
            $traitCollection->add(
                HouseTrait::create(
                    $trait['id'],
                    $trait['name']
                )
            );
        }

        return new self(
            Uuid::createFromString($uuid),
            Name::createFromString($name),
            Colour::createFromString($colour),
            Founder::createFromString($founder),
            Animal::createFromString($animal),
            Element::createFromString($element),
            Ghost::createFromString($ghost),
            CommonRoom::createFromString($commonRoom),
            $headCollection,
            $traitCollection
        );
    }

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getColour(): Colour
    {
        return $this->colour;
    }

    public function getFounder(): Founder
    {
        return $this->founder;
    }

    public function getAnimal(): Animal
    {
        return $this->animal;
    }

    public function getElement(): Element
    {
        return $this->element;
    }

    public function getGhost(): Ghost
    {
        return $this->ghost;
    }

    public function getCommonRoom(): CommonRoom
    {
        return $this->commonRoom;
    }

    public function getHeadCollection(): HeadCollection
    {
        return $this->headCollection;
    }

    public function getTraitCollection(): TraitCollection
    {
        return $this->traitCollection;
    }
}