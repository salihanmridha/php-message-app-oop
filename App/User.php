<?php

namespace App;

use App\Contracts\UserInterface;

abstract class User implements UserInterface {
    protected int $userId;
    protected string $firstName;
    protected string $lastName;
    protected string $email;
    protected ?string $profilePicture;

    public function __construct(int $userId, string $firstName, string $lastName, string $email, ?string $profilePicture = null)
    {
        $this->userId = $userId;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->profilePicture = $profilePicture;
    }

    //abstract public function getFullName(): string;

    public function getProfilePicture(): ?string
    {
        if ($this->profilePicture !== null) {
            return $this->profilePicture;
        } else {
            return "https://media.licdn.com/dms/image/D4D35AQHCzwDLKvxTvw/profile-framedphoto-shrink_400_400/0/1678795733881?e=1680778800&v=beta&t=GJO9Kce4XS1V5qqkwup0gefC9ab8u9gX3efSxnLnSrM";
        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function save(): bool
    {
        // validate email and profile picture
        $isValid = true;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
        }
        if ($this->profilePicture !== null && !preg_match('/\.jpg$/', $this->profilePicture)) {
            $isValid = false;
        }
        return $isValid;
    }
}