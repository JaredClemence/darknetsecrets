<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReferralProgramNotice extends Mailable
{
    use Queueable, SerializesModels;

    private $referrer;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Referrer $referrer)
    {
        $this->referrer = $referrer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $referrer = $this->referrer;
        return $this->from('webmaster@darknetsecrets.com')
                ->subject("[DarkNet Secrets] You just referred a friend!")
                ->text('email.text.new-referral')->with( compact('referrer'));
    }
}
