<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Campaign\Referrer;
use App\Campaign\Promotion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use App\Jobs\SendEmail;
use App\Mail\VerifyEmailAddress;
use Illuminate\Mail\Mailable;

/**
 * When a visitor submits an email address, the site sends an email with a verification link.
 */
class T00002Test extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
    
    public function testPageLoad()
    {
        //Queue::fake();
        Mail::fake();
        $faker = $this->faker();
        $email = $faker->email;
        $code = factory(Promotion::class)->create(['active'=>true]);
        $url = route('registration.create', compact('code'));
        $data = [
            'email'=>$email
        ];        
        
        $response = $this->post($url, $data);
        
        $new_ref_id = Referrer::where([
            'email'=>$email,
            'promotion_id'=>$code->id
        ])->first();
        $thankYou = route('registration.success',compact('code','new_ref_id'));
        $this->assertNotNull( $new_ref_id->id, "The email address is registered for the promotion." );
        
        $response->assertRedirect($thankYou);
        
        Mail::assertSent(VerifyEmailAddress::class);
    }
}
