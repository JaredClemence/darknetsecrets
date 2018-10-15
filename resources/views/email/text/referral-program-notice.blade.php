Dear DarkNet User:

You successfully registered to receive updates on the new DarkNet Program. When 
the free class launches in coming months, you will learn:

* how to search the Internet without being detected.
* how to bounce your computer's signal around the glob like a hacker with the click of a button.
* how to send and receive messages that not even the NSA can read.

One of our previous students said that the most useful tool he had was a light and 
portable laptop, which is why we are giving away free laptops for referrals. Share 
your referral link with friends, and you can get a free laptop too!

Click this link to get your referral link and to read the details: {{ route('registration.success',['ref_id'=>$referrer,'code'=>$referrer->promotion]) }}

Welcome to the family! We are glad to have you aboard.

Kind regards,

DarkNet WebMaster

@include('email.text.unsubscribe',['referrer'=>$referrer])