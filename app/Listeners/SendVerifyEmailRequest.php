<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\VerifyEmailAddress;
use App\Events\RegisteredUserEvent;
use App\Campaign\Referrer;
use App\Jobs\SendEmail;

class SendVerifyEmailRequest
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
    public function handle(RegisteredUserEvent $event)
    {
        $referrer = $event->getReferrer();
        /* @var $referrer Referrer */
        $email = $referrer->email;
        $mail = new VerifyEmailAddress( $referrer );
        $mail->to( $email );
        SendEmail::dispatch( $mail );
    }
}
