<?php

namespace App\Contracts;

use App\Contracts\UserInterface;

interface MessageInterface {
    public function getSender(): UserInterface;

    public function getReceiver(): UserInterface;

    public function getText(): string;

    public function getCreationTime(): int;

    public function getType(): string;

    public function getFormattedCreationTime(string $format = 'Y-m-d H:i:s'): string;

    public function save(): bool;
}