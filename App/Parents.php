<?php

namespace App;

use App\User;

class Parents extends User
{
    protected ?string $salutation;

    public function __construct(int $userId, string $firstName, string $lastName, string $email, ?string $profilePicture = null, ?string $salutation = null)
    {
        parent::__construct($userId, $firstName, $lastName, $email, $profilePicture);
        $this->salutation = $salutation;
    }

    public function getFullName(): string
    {
        if ($this->salutation !== null) {
            return $this->salutation . ' ' . $this->firstName . ' ' . $this->lastName;
        } else {
            return $this->firstName . ' ' . $this->lastName;
        }
    }

}