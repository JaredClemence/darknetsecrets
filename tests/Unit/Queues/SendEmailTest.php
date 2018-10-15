<?php

namespace Tests\Unit\Queues;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendEmail;
use App\Campaign\Referrer;
use App\Mail\VerifyEmailAddress;

class SendEmailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testQueing()
    {
        Queue::fake();
        
        $referrer = factory( Referrer::class )->create();
        $mailable = new VerifyEmailAddress( $referrer );
        dispatch( new SendEmail( $mailable ) );
        
        Queue::assertPushed( SendEmail::class );
    }
}
