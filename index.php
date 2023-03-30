<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Student;
use App\Parents;
use App\Teacher;
use App\Message;

//create student object
$student = new Student(1, 'Salihan', 'Mridha', 'salihanmridha@gmail.com', null);

//create parents object
$parents = new Parents(2, "Abdul", "Hadi", "abdulhadi@gmail.com", null, "Mr. ");

//create teacher object
$teacher = new Teacher(3, "Kyle", "Simpson", "kyle@email.com", null, "Mr. ");

// Create message object
$message = new Message($teacher, $student, 'Hello Salihan!', time(), 'Manual');

// Validate and save message
if ($message->save()) {
    echo "Message saved successfully!" . PHP_EOL;
} else {
    echo "Failed to save message!" . PHP_EOL;
}

// Access message properties
echo "<br><br> From: " . $message->getSender()->getFullName() . PHP_EOL;
echo "<br>" . "To: " . $message->getReceiver()->getFullName() . PHP_EOL;
echo "<br>" . "Message Text: " . $message->getText() . PHP_EOL;
echo "<br>" . "Message Type: " . $message->getType() . PHP_EOL;
echo "<br>" . "Creation Time: " . $message->getFormattedCreationTime() . PHP_EOL;

