<?php
namespace App;
use App\Contracts\TeacherInterface;
use App\User;
use App\Contracts\UserInterface;
use App\Contracts\MessageInterface;

class Teacher extends User implements TeacherInterface {
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

    public function sendMessage(UserInterface $receiver, string $text, int $creationTime, string $type): MessageInterface
    {
        if ($receiver instanceof TeacherInterface || $receiver instanceof Parent) {
            throw new Exception('Teacher can only send message to Student');
        } else {
            return new Message($this, $receiver, $text, $creationTime, $type);
        }
    }
}