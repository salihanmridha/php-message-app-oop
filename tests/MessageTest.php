<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use App\Teacher;
use App\Parents;
use App\Student;
use App\Message;
use App\Contracts\UserInterface;

class MessageTest extends TestCase
{
    private $teacher;
    private $parent;
    private $student;
    private $currentTime;

    protected function setUp(): void
    {
        $this->teacher = new Teacher(1,'Kyle', 'Simpson', 'kyle@email.com', null, "Mr. ");
        $this->parent = new Parents(2,'Abdul', 'Hadi', 'abdulhadi@gmail.com', null, "Mr. ");
        $this->student = new Student(3,'Salihan', 'Mridha', 'salihanmridha@gmail.com', null);
        $this->currentTime = time();
    }

    public function testCanCreateMessage()
    {
        $message = new Message($this->teacher, $this->student, 'Hello Salihan', $this->currentTime, 'Manual');

        $this->assertInstanceOf(Message::class, $message);
        $this->assertInstanceOf(UserInterface::class, $message->getSender());
        $this->assertInstanceOf(UserInterface::class, $message->getReceiver());
        $this->assertEquals($this->teacher, $message->getSender());
        $this->assertEquals($this->student, $message->getReceiver());
        $this->assertEquals('Hello Salihan', $message->getText());
        $this->assertEquals($this->currentTime, $message->getCreationTime());
        $this->assertEquals('Manual', $message->getType());
        $this->assertIsString($message->getFormattedCreationTime());
    }

    public function testSaveMessage()
    {
        $message1 = new Message($this->teacher, $this->student, 'Hello', $this->currentTime, 'Manual');
        $this->assertTrue($message1->save());

        $message2 = new Message($this->student, $this->teacher, 'Hi', $this->currentTime, 'Manual');
        $this->assertTrue($message2->save());

        $message3 = new Message($this->student, $this->teacher, 'Bye', $this->currentTime, 'System');
        $this->assertFalse($message3->save());

        $message4 = new Message($this->parent, $this->student, 'Hello', $this->currentTime, 'Manual');
        $this->assertFalse($message4->save());
    }
}

