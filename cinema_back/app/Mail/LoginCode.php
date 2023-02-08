<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginCode extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $code;

    public function __construct(User $user, $code)
    {
        $this->user = $user;
        $this->code = $code;
    }

    public function build()
    {
        return $this->subject('Код для входа в систему')
            ->view('emails.LoginCode', [$this->code]);
    }
}