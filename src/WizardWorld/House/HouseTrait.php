<?php
declare(strict_types=1);

namespace App\WizardWorld\House;

use App\WizardWorld\Common\ValueObject\Uuid;
use App\WizardWorld\House\ValueObject\TraitName;
use Exception;

class HouseTrait
{
    public function __construct(
        private readonly Uuid $id,
        private readonly TraitName $name
    ){}

    /**
     * @throws Exception
     */
    public static function create(string $uuid, string $traitName): self
    {
        return new self(
            Uuid::createFromString($uuid),
            TraitName::createFromString($traitName)
        );
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): TraitName
    {
        return $this->name;
    }
}