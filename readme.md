# Project Name - Message APP

## Project Setup

### Prerequisite
- PHP v8.1
- Composer [more details](https://getcomposer.org/)

### Installation

- Clone the repository (```https://github.com/salihanmridha/php-message-app-oop.git```)
- go to root directory of the application
- Install composer by running the command - ```composer install``` in your console
- That's it! Application setup done.

## How to use the application
Please run the `index.php` file from root directory in your browser. You'll see the result.
You can change hard coded values in `index.php` file and alter teacher, parents and student instance in the Message class instantiation. 

## Test cases
I've written only 2 test cases to show I'm able to do test cases. I felt message class's unit test should be more important. So I created:

- Can Create Message
- Save Message

You can run test cases by this command `./vendor/bin/phpunit` or `./vendor/bin/phpunit tests/MessageTest.php`

