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
    public function testPageLoad( $url )
    {
        $offerHeading = "Free training about Internet privacy";
        $registrationButton = "<button type=\"submit\" class=\"btn btn-primary\">Register</button>";
        $termsAndConditions = "Terms & Conditions";
        
        $response = $this->get($url);
        
        $response->assertSeeText($offerHeading);
        $response->assertSee($registrationButton);
        $response->assertSeeText($termsAndConditions);
    }
    public function provider(){
        parent::setUp();
        $endpoint = 'registration.new';
        $ref_id = 1; //factory( Referrer::class )->create();
        $urlNoReferrer = [ route($endpoint) ];
        $urlWithReferrer = [ route($endpoint, compact('ref_id')) ];
        return compact('urlNoReferrer','urlWithReferrer');
    }
}
