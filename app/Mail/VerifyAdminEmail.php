<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use App\User;

class VerifyAdminEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;
    public $role;
    public $token;
    public function __construct($adminemail, $adminrole, $adminverifyToken)
    {
        $this->email = $adminemail;
        $this->role = $adminrole;
        $this->token = $adminverifyToken;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.admin_verify')->with([
            'email'=> $this->email,
            'role' => $this->role,
            'token' => $this->token,
        ]);
    }
}
