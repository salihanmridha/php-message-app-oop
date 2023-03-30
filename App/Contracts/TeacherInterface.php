<?php

namespace App\Contracts;

use App\Contracts\UserInterface;

interface TeacherInterface extends UserInterface {
    public function sendMessage(UserInterface $receiver, string $text, int $creationTime, string $type): MessageInterface;
}