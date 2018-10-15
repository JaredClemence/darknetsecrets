<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\ReferralNotice;
use App\Jobs\SendEmail;

class SendReferralProgramNotice
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $referrer = $event->getReferrer();
        if ($referrer) {
            /* @var $referrer Referrer */
            $email = $referrer->email;
            $mail = new ReferralNotice($referrer);
            $mail->to($email);
            $event = new SendEmail( $mail );
            dispatch( $event );
        }
    }
}
