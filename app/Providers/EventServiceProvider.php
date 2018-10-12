<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\NewPromotionRegistration;
use App\Events\EmailAddressVerified;
use App\Events\Unsubscribed;
use App\Events\QualifiedPrizeEntry;
use App\Listeners\SendContestUpdateNotification;
use App\Listeners\SendUnsubscribeConfirmation;
use App\Listeners\SendVerifyRegisteredEmailNotification;
use App\Listeners\AddPrizeEntry;
use App\Listeners\SendPrizeEntryNotification;

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
            SendContestUpdateNotification::class
        ],
        Unsubscribed::class => [
            SendUnsubscribeConfirmation::class
        ],
        QualifiedPrizeEntry::class=>[
            AddPrizeEntry::class,
            SendPrizeEntryNotification::class
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
