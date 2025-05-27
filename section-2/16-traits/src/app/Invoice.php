<?php

namespace App;

class Invoice
{
    use Mail;
    public function process()
    {
        echo 'Processed invoice' . PHP_EOL;

        $this->sendMail();
    }
}