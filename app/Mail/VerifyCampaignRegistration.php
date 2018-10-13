<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Campaign\Referrer;

class VerifyCampaignRegistration extends Mailable
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
        $event = "free tutorials and video lessons about how to surf the Internet without being traced";
        $confirmationLink = route('verify',[
            'ref_id'=>$referrer->id,
            'sec_token'=>$referrer->sec_token
        ]);
        
        return $this->from('webmaster@darknetsecrets.com')
                ->subject("Confirm DarkNetSecrets Registration")
                ->text('email.text.confirm-registration')->with( compact('referrer','event','confirmationLink'));
    }
}
