@extends('layouts.landing')
@section('content')
<script src="{{ @asset('js/btn_adder.js') }}" type="text/javascript"></script>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1>Registration Complete</h1>
            <p>You are registered for updates on the class "Learn to surf the Internet without being traced".</p>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <div class="alert alert-success">{{$successMessage}}</div>
        </div>
    </div>
    <div class="jumbotron">
        <h1>You may qualify for a free laptop. See information below.</h1>
        <p class="lead">Registration complete! You are registered for updates on the class "Learn to surf the Internet without being traced".</p>
        <h1>What's next</h1>
        <p class="lead">Next, verify your email address and see how to get a free laptop below.</p>
        
    </div>
    <div class="row">
        <div class="col-10 offset-xs-1 col-md-8">
            <h1>How would you like to<br/>surf the dark net with a free laptop?</h1>
            <div class="row">
                <div class="col-12 col-md-4 order-2 order-md-1">
                    <ul>
                        <li>Folding touch-screen</li>
                        <li>Lightweight (3.8 pounds)</li>
                        <li>Windows 10</li>
                        <li>32 GB Ram!</li>
                    </ul>
                </div>
                <div class="col-12 col-md-8 order-1 order-md-2">
                    <img src="{{ asset('image/prizes/iViewFoldingLaptop.png') }}" class="img img-fluid" alt="folding laptop with touchscreen" />
                    <p><small>To get a free laptop, share your referral url with friends. If three friends register, this laptop could be yours. See details below.</small></p>
                </div>
            </div>
            
                    <div class="alert alert-info">
                        <strong>Your unique referral link:</strong> <small>(Share with friends)</small><br/><br/>
                        <span id="referralUrl">{{ route('registration.new', [
                            'ref_id'=>$referrer
                        ]) }}</span><br/>
                        <span id="btn_drop">&nbsp;</span>
                    </div>
            <p>
                Copy the link above. Share it with friends by Facebook, Twitter, email, messenger, or any method you choose. When three friends register for a free training, you qualify to receive a FREE laptop.
            </p>
            <h1>It's more fun with friends</h1>
            <p>All things in life are more fun with friends. Because you will learn 
            more when you have someone to talk to, we encourage you to share this with 
            people you care about. Imagine how much fun you can have when you can send 
            your best friend secretly encoded messages that only the two of you can read.</p>
            <h2>Plus, there is a free laptop!</h2>
            <p>If sharing the experience of the dark net is not encouraging enough, there is always 
                the free laptop that you can receive when you refer friends and family.</p>
            <p>What would you do with a new laptop? The possabilities are endless!</p>
        </div>
        <div class="col-12 col-md-4">
            <h2>Things to do with a free laptop</h2>
            <ul class="group-list">
                @php
                $awesomething = [
                    "Make it a \"burner\" laptop. (Every hacker needs a burner),",
                    "Prop up the wobbly kitchen table,",
                    "Give it away as a gift,",
                    "Donate it to a homeless veteran, or",
                    "Keep it... It's a FREE laptop that is awesome!"
                ];
                
                @endphp
                @foreach( $awesomething as $item )
                <li class="list-group-item">{{$item}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-8 offset-md-2">
            <div style="min-height:100px;">
                <!-- spacer to provide more attractive layout -->
            </div>
            <h1>Legal Stuff and Boring Details</h1>
            <p>
                What would the world be without all the legal stuff at the 
                bottom of every awesome giveaway? Read below for details about 
                the qualification process that govern the selection process, 
                the method of shipping, how you can be disqualified, and other 
                important but boring details. (You should read every word). When a person 
                provides a referral link to any other person with intent 
                to enter this contest and to win the laptop, that person accepts all terms 
                on this page and linked in the "Terms & Conditions" document.
            </p>
            <p>
                <a href="{{ url('/terms') }}" target="_blanK">Terms & Conditions apply.</a>
                Click the link to see extended terms & conditions that apply to all promotions 
                offered on this site. Any terms not covered below are probably covered there.
                If the term is not covered below or in the linked documents, then the missing 
                terms shall be determined by the laws in the State of California.
            </p>
            <p>
                The chance of winning a laptop is governed by the number of referrals collected. 
                A winner will be selected when a period of 30 days passes without a 
                new referral registration not to exceed June 30, 2019.
            </p>
            <p>
                This is a contest that is won by random selection. Entry into the contest 
                is free. At no point will the site request or receive money in 
                exchange for entries into the drawing. 
                The site distinguishes this contest from a raffle or game of chance in 
                that the site never exposes participants to risk of loss.
            </p>
            <p>
                The prize in this contest may be viewed at the following url: 
                <a href="https://www.amazon.com/IVIEW-MAX2-BK-Laptop-Touchscreen-Windows/dp/B01NC0DJ4B/">iView Max2-BK</a>.
                The prize indicated here shall be identified as the "laptop" on this page.
                The site owner has completed his or her obligations to the contest winner 
                when the tracking number indicates completed shipment to address provided by the winner. 
                The winner is responsible to provide a correct address to a safe delivery location.
                The site owner disclaims responsibility for shipping or handling and shall not be liable for the 
                condition of the package or its contents on arrival.
            </p>
            <p>
                In the event that the prize indicated above is not available at the 
                end of the contest, the site owner may select and replace a laptop of equal or greater value than 
                the laptop described. The replacement may have features that differ from those 
                listed above. At the time of this writing, the value of the laptop is $149.99.
            </p>
            <p>
                The value of a replacement laptop shall not exceed $200. In the event that a 
                replacement laptop cannot be found for less than $200, the site owner will 
                have satisfied his or her obligations to the winner by providing a money order 
                in the amount of $200 in lieu of the laptop. Delivery of the check to the 
                address provided by the winner as indicated by a tracking code shall constitute 
                satisfaction of duties and relieve the site from further obligation.
            </p>
            <p>
                One winner will be selected from the verified registrants that refer three or more 
                additional, verified registrants. A verified registrant that refers additional 
                visitors or registered visitors will not be counted in the contest drawing unless 
                the number of registered visitors that become verified registrants meets or exceeds three.
            </p>
            <p>
                To receive the prize, the selected recipient must provide a shipping address.
                When the tracking number assigned to the laptop purchase indicates 
                successful delivery of the package to the designated address, the site 
                completes its obligations to the winner. The site does not guarantee 
                the condition of the product and disclaims liability for damage in shipping or 
                handling of the product. The site promises only to place the order and 
                to verify by tracking number that the new laptop is delivered to the 
                designated address.
            </p>
            <p>
                The site must select a winner for the contest if the trigger condition identified 
                in the linked Terms & Conditions is met. The winner shall be notified via 
                the registered email. The winner has 3 months to reply to that email with 
                a designated delivery address within the United States of America. If the 
                winner fails to provide a delivery address in the designated time, the site 
                has satisfied its obligations and will not select second winner.
            </p>
            <p>
                A person may be disqualified from winning the laptop if any of the following are true:
            </p>
            <ul>
                <li>The person provides a designated address that is outside the United States of America.</li>
                <li>The person attempts to assign his or her prize to a third party.</li>
                <li>The person shares the referral link without intending to enter the contest.</li>
                <li>The person is a minor.</li>
                <li>Un-subscribing, which can be done from any email sent from the site by clicking a link.</li>
            </ul>
            <p>The site reserves the right to select an alternate winner when the 
                contest winner is disqualified for any reason above.</p>
        </div>
    </div>
</div>
@endsection