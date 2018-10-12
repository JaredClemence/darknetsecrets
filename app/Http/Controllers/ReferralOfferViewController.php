<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign\Referrer;
use App\Campaign\Promotion;
use App\Events\NewPromotionRegistration;

class ReferralOfferViewController extends Controller {

    public function displayOffer(\App\Campaign\Referrer $referrer) {
        //if referrer = null, select random, active, promotion
        //else 
        //    select promotion by referrer.
        //    trigger offer view event for referrer
        //load promotion page
        //display promotion page.
        return view('promotion.offer');
    }

    public function registerVisitor(Request $request, Promotion $promotion, Referrer $referrer) {
        //validate email format
        $request->validate(
                [
                    'email' => 'required'
                ]
        );
        $nextPage = (route('registration.new', compact('promotion', 'referrer')));
        $email = $request->input('email');
        $errorMsg = $this->prepareErrorMessage($promotion, $email);
        try {
            if ($errorMsg) {
                //    flash an error message
                flash('errorMsg', $errorMsg);
                //    redirect to rejection page
                $nextPage = route('registration.error', compact('promotion'));
                throw new \Exception();
            }
            $newRegistration = $this->createNewRegistration( $promotion, $email );
            
            if( $referrer ){
            //    link newRegistration to referrer
                $newRegistration->referrer_id = $referrer->id;
            }
            $newRegistration->save();
            $event = new NewPromotionRegistration($newRegistration);
            //    trigger registration event for referrer and promotion
            $event->dispatch();
            //load promotion page
            //redirect to thank you page.
            $nextPage = (route('registration.success', compact('promotion', 'referrer')));
        
        } catch (\Exception $e) {
            
        }
        return redirect($nextPage);
    }

    public function successfulRegistration(Promotion $code, Referrer $new_ref_id) {
        //generate referral link
        $referrer = $new_ref_id;
        $promotion = $code;
        $referralUrl = route('registration.new', ['ref_id'=>$referrer->id]);
        $email = $referrer->email;
        //return view with contest prize offer and terms.
        return view('promotion.thank-you', compact('referralUrl','email'));
    }

    public function rejectedRegistration(Promotion $promotion, Referrer $referrer) {
        
    }

    private function prepareErrorMessage($promotion, $email) {
        $errorMsg = "";
        //isRegistered = verify that email is not registered
        $isRegistered = $this->isEmailRegisteredForPromotion($promotion, $email);
        if ($isRegistered == false) {
            $errorMsg = "The email address '$email', is already registered for the current promotion.";
        }
        $isActive = $promotion->active;
        if ($isActive == false) {
            $errorMsg = "The promotion is no longer active. Your email address has not been saved.";
        }
        return $errorMsg;
    }

    private function createNewRegistration(Promotion $promotion, $email) {
        $referrer = Referrer::firstOrCreate( [
            'promotion_id'=>$promotion->id,
            'email'=>$email
        ] );
        return $referrer;
    }

}
