<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    // The user instance and new password
    public $user;
    public $newPassword;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $newPassword
     */
    public function __construct(User $user, $newPassword)
    {
        $this->user = $user;
        $this->newPassword = $newPassword;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Set the email subject and view
        return $this->subject('Your Password Has Been Reset')
                    ->view('emails.password-reset');
    }
}
