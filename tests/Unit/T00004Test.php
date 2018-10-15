<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Campaign\Referrer;

/**
 * Given a registered user and a custom verification link, 
 * when the site loads the verification link, 
 * the registration status changes to "verified."
 */
class T00004Test extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $referrer = factory( Referrer::class )->create(['verified'=>false]);
        $verificationUrl = route('verify', [
            'ref_id'=>$referrer,
            'sec_token'=>$referrer->secure_token
        ] );
        
        $response = $this->get( $verificationUrl );
        
        $updatedReferrer = Referrer::find( $referrer->id );
        $this->assertTrue( $updatedReferrer->verified );
    }
}
