<?php
declare(strict_types=1);

namespace App\WizardWorld\House;

use App\WizardWorld\House\ValueObject\FirstName;
use App\WizardWorld\House\ValueObject\LastName;
use Exception;

class Head
{
    public function __construct(
        private readonly FirstName $firstName,
        private readonly LastName $lastName
    ){}

    /**
     * @throws Exception
     */
    public static function create(
        string $firstName,
        string $lastName
    ): self
    {
        return new self(
            FirstName::createFromString($firstName),
            LastName::createFromString($lastName)
        );
    }

    public function getFirstName(): FirstName
    {
        return $this->firstName;
    }

    public function getLastName(): LastName
    {
        return $this->lastName;
    }
}