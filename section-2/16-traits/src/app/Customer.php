<?php

namespace App;

class Customer
{
    use Mail;
    public function updateProfile()
    {
        echo 'Profile updated' . PHP_EOL;

        $this->sendMail();
    }
}