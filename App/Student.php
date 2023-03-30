<?php

namespace App;

class Student extends User {
    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}