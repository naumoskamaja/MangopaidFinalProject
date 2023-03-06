<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetedPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $password;
    public function __construct($data,$password)
    {
        $this->data = $data;
        $this->password = $password;
    }
    public function build()
    {
        $myData = $this->data;
        $myPassword = $this->password;
        return $this->view('emails.src.reseted-password',compact('myData','myPassword'));
    }
}
