<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Campaign\Referrer;

/**
 * Given a site visitor, the site loads an offer page.
 */
class T00001Test extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @dataProvider provider
     */
    public function testPageLoad( $name, $useReferrer )
    {
        $ref_id = null;
        if( $useReferrer ){
            $ref_id = factory( Referrer::class )->create();
        }
        $url = route( $name, compact('ref_id'));
        
        $offerHeading = "Free training about Internet privacy";
        $registrationButton = "<button type=\"submit\" class=\"btn btn-primary\">Register</button>";
        $termsAndConditions = "Terms & Conditions";
        
        $response = $this->get($url);
        
        $response->assertSeeText($offerHeading);
        $response->assertSee($registrationButton);
        $response->assertSeeText($termsAndConditions);
    }
    public function provider(){
        $endpoint = 'registration.new';
        $urlNoReferrer = [ $endpoint, false ];
        $urlWithReferrer = [ $endpoint, true ];
        return compact('urlNoReferrer','urlWithReferrer');
    }
}
