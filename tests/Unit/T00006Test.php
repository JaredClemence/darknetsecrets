<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use App\Campaign\Referrer;
use App\Mail\ReferralNotice;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendEmail;

class T00006Test extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testVerifyEmail_06()
    {
        Mail::fake();
        Queue::fake();
        
        $parent = factory( Referrer::class )->create();
        $referrer = factory( Referrer::class )->create(
                [
                    'verified'=>false,
                    'referred_by'=> $parent->id,
                    'promotion_id'=>$parent->promotion_id
                ]
                );
        $verificationUrl = route('verify', [
            'ref_id'=>$referrer,
            'sec_token'=>$referrer->secure_token
        ] );
        
        $response = $this->get( $verificationUrl );
        
        $updatedReferrer = Referrer::find( $referrer->id );
        
        Mail::assertNotSent(ReferralNotice::class);
        Queue::assertPushed( SendEmail::class );
    }
}
