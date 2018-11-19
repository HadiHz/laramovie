<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $flag;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$flag)
    {
        $this->name = $name;
        $this->flag = $flag;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        if($this->flag == 1){//َAgreement
            return $this->markdown('admin.mail.agreement');
        }elseif ($this->flag == 2){//Available
            return $this->markdown('admin.mail.available');
        }


    }
}
