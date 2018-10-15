<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Campaign\Referrer;

/**
 * Given a registered user and a custom verification link, 
 * when the site loads the verification link, 
 * the site loads a page that shows the referral contest and a custom referral url.
 */
class T00005Test extends TestCase
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
        
        $response->assertSeeText("Folding touch-screen");
        $response->assertSeeText("Windows 10");
        $response->assertSeeText("32 GB Ram!");
        $response->assertSeeText("Share it with friends");
    }
}
