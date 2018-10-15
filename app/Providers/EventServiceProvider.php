<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\NewPromotionRegistration;
use App\Events\EmailAddressVerified;
use App\Listeners\SendVerifyRegisteredEmailNotification;
use App\Listeners\SendNewReferralNotice;

class EventServiceProvider extends ServiceProvider {

    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewPromotionRegistration::class => [
            SendVerifyRegisteredEmailNotification::class
        ],
        EmailAddressVerified::class => [
            SendNewReferralNotice::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot() {
        parent::boot();

        //
    }

}
