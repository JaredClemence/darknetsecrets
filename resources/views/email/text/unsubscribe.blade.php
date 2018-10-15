P.S. Are you receiving these messages by mistake? 
Would you like for us to stop sending them? 
Click this link to remove yourself from our mailing list. 
(Note, unsubscribing from emails will cancel your registration 
for any prizes that you might be currently eligible to receive.)

{{ route('unsubscribe', [
    'ref_id'=>$referrer,
    'sec_token'=>$referrer->secure_token
]) }}