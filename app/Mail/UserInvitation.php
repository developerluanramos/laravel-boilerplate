<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserInvitation extends Mailable
{
    use Queueable, SerializesModels;
    public $invitation;

    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

    public function build()
    {
        return $this->subject('Convite para cadastro no Sistema de Frequência')
            ->markdown('emails.invitation', [
                'registerUrl' => route('register', ['token' => $this->invitation->token]),
                'expiresIn' => $this->invitation->expires_at->diffForHumans(),
            ]);
    }
}
