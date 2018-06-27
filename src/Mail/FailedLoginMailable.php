<?php

namespace Mahfuz\LoginActivity\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FailedLoginMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $attempts;
    public $outroLines = [
            "Dear User, our system has detected multiple failed login attempts into your account. Please find a list of latest failed attempts below -",
            "*** If you think it wasn't you and found it suspicious kindly consider logging into your account with valid credentials 
                                                        and update your password to a stronger one."
        ];

    /**
     * Create a new message instance.
     * @param $attempts
     *
     * @return void
     */
    public function __construct($attempts)
    {
        $this->attempts = $attempts;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('login-activity::login-activity.email-failed-attempt');
    }
}
