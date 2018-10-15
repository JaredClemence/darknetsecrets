<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Campaign\Promotion;
use App\Campaign\Referrer;

/**
 * Given a site visitor with a custom referral url, 
 * the site loads the same offer displayed to the referrer.
 */
class T00003Test extends TestCase
{
    use RefreshDatabase;
    
    /**
     * Given a site visitor with a custom referral url, the site loads the same offer displayed to the referrer.
     *
     * @return void
     */
    public function testLoadSamePromotion()
    {
        $promotions = factory( Promotion::class, 3 )->create();
        $randomized = $promotions->shuffle();
        $code = $randomized->pop();
        
        $referrer = $ref_id = factory( Referrer::class )->create(['promotion_id'=>$code->id]);
        $createUrl = route('registration.create', ['code'=>$code]);
        
        $referredViewUrl = route('registration.new',compact('ref_id'));
        $response = $this->get( $referredViewUrl );
        
        $response->assertStatus(200);
        $response->assertViewHas('createUrl', $createUrl);
    }
}
