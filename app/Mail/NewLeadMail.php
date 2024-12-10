<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewLeadMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public User $user)
    {
     // print_r($user); exit;
      //  dd($randomPassword);
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->view('emails.projectassignedemail')
            ->subject('Holiogt New Project Assigned')
            ->with(['logoPath' => public_path('profile/logo.png')]);
    }
}
