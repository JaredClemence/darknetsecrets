<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign\Referrer;
use App\Campaign\Promotion;
use App\Events\NewPromotionRegistration;
use Illuminate\Support\Facades\Session;
use App\Events\EmailAddressVerified;

class ReferralOfferViewController extends Controller {

    public function displayOffer(Referrer $ref_id) {
        $referrer = $ref_id;
        $promotion = null;
        if ($referrer->exists) {
            $promotion = $referrer->promotion;
        } else {
            $promotion = Promotion::firstOrCreate(['code' => 'free_training', 'name' => 'Free Training']);
        }
        $createUrl = route('registration.create', ['code' => $promotion]);
        return view('promotion.offer', compact('createUrl'));
    }

    public function registerVisitor(Request $request, Promotion $code, Referrer $ref_id) {
        //validate email format
        $promotion = $code;
        $referrer = $ref_id;
        $request->validate(
                [
                    'email' => 'required'
                ]
        );
        $nextPage = (route('registration.new', compact('promotion', 'referrer')));
        $email = $request->input('email');
        $errorMsg = $this->prepareErrorMessage($promotion, $email);
        try {
            if (strlen($errorMsg) > 0) {
                //    flash an error message
                Session::flash('errorMsg', $errorMsg);
                //    redirect to rejection page
                $nextPage = route('registration.error', compact('promotion'));
                throw new \Exception();
            }

            $newRegistration = $this->createNewRegistration($promotion, $email);
            $newRegistration->referred_by = $referrer->id;
            $newRegistration->save();
            $event = new NewPromotionRegistration($newRegistration);
            //    trigger registration event for referrer and promotion
            event($event);
            //load promotion page
            //redirect to thank you page.
            $nextPage = (route('registration.success', ['code' => $promotion, 'new_ref_id' => $newRegistration]));
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect($nextPage);
    }

    public function successfulRegistration(Promotion $code, Referrer $new_ref_id) {
        //generate referral link
        $referrer = $new_ref_id;
        $promotion = $code;
        $referralUrl = route('registration.new', ['ref_id' => $referrer->id]);
        $email = $referrer->email;
        //return view with contest prize offer and terms.
        $successMessage = "Successfully registered '$email'. We will send an email in five to ten minutes. Please click the link in the email to verify your email address.";
        return view('promotion.thank-you', compact('referralUrl', 'successMessage'));
    }

    public function rejectedRegistration(Promotion $promotion, Referrer $referrer) {
        
    }

    public function unsubscribe(Referrer $ref_id, $sec_token) {
        
    }

    public function verify(Referrer $ref_id, $sec_token) {
        if ($sec_token == $ref_id->secure_token) {
            $ref_id->verified = true;
            $ref_id->save();
            $email = $ref_id->email;
            $successMessage = "Verified '$email'. You are now eligible to receive bonuses when you provide referrals.";
            $event = new EmailAddressVerified($ref_id);
            event( $event );
            return view('promotion.thank-you', compact('referralUrl', 'successMessage'));
        } else {
            return "Bad link";
        }
    }

    private function prepareErrorMessage($promotion, $email) {
        $errorMsg = "";
        //isRegistered = verify that email is not registered
        $isRegistered = $this->isEmailRegisteredForPromotion($promotion, $email);
        if ($isRegistered == true) {
            $errorMsg = "The email address '$email', is already registered for the current promotion.";
        }
        $isActive = $promotion->active;
        if ($isActive == false) {
            $errorMsg = "The promotion is no longer active. Your email address has not been saved.";
        }
        return $errorMsg;
    }

    private function createNewRegistration(Promotion $promotion, $email) {
        $referrer = Referrer::where([
                    'promotion_id' => $promotion->id,
                    'email' => $email
                ])->first();
        if ($referrer == null) {
            $referrer = new Referrer();
            $referrer->email = $email;
            $referrer->promotion_id = $promotion->id;
        }
        if ($referrer->secure_token == null) {
            $timestamp = time();
            $referrer->secure_token = substr(md5($timestamp), 10, 5);
        }
        return $referrer;
    }

    private function isEmailRegisteredForPromotion(Promotion $promotion, $email) {
        $id = $promotion->id;
        $referrer = Referrer::where([
                    'promotion_id' => $id,
                    'email' => $email
                ])->first();
        return $referrer != null;
    }

}
