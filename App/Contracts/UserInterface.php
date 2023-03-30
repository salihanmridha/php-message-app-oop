<?php

namespace App\Contracts;

interface UserInterface {
    public function getFullName(): string;
    public function getProfilePicture(): ?string;
    public function getEmail(): string;
    public function getUserId(): int;
    public function save(): bool;
}