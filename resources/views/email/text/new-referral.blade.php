Dear DarkNet User:

You might be one step closer to winning the laptop! One of your friends registered to 
receive a laptop. An email is being sent to your friend to ensure that their address 
is valid.

To qualify for the laptop, you must share your personal referral link (available below). 
Then, your friends must click your link to visit the site, 
register, and verify their email address 
to receive updates about the free classes that are coming soon. It's that simple!

To see details about the laptop, visit this link: {{route('registration.success',[
    'code'=>$referrer->promotion,
    'ref_id'=>$referrer
])}}

Just 3 referrals, and the laptop is nearly yours.

Share this link with more friends to help solidify your chances:

{{route('registration.new',[
    'ref_id'=>$referrer
])}}

Kind regards,

DarkNet System Admin

@include('email.text.unsubscribe', ['referrer'=>$referrer])