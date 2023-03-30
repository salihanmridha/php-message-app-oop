<?php

namespace App;
use App\Contracts\MessageInterface;
use App\Contracts\UserInterface;

class Message implements MessageInterface
{
    private UserInterface $sender;

    private UserInterface $receiver;

    private string $text;

    private int $creationTime;

    private string $type;

    public function __construct(UserInterface $sender, UserInterface $receiver, string $text, int $creationTime, string $type)
    {
        $this->sender = $sender;
        $this->receiver = $receiver;
        $this->text = $text;
        $this->creationTime = $creationTime;
        $this->type = $type;
    }

    public function getSender(): UserInterface
    {
        return $this->sender;
    }

    public function getReceiver(): UserInterface
    {
        return $this->receiver;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getCreationTime(): int
    {
        return $this->creationTime;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getFormattedCreationTime(string $format = 'Y-m-d H:i:s'): string
    {
        $date = new \DateTime();
        $date->setTimestamp($this->creationTime);
        return $date->format($format);
    }

    public function save(): bool
    {
        if (($this->sender instanceof Student || $this->sender instanceof Parents) && !($this->receiver instanceof Teacher)) {
            return false;
        }
        if ($this->sender instanceof Student && $this->type === 'System') {
            return false;
        }
        return true;
    }
}