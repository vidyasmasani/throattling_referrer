<?php
namespace vidyasmasani\ThroattleReferrerApp;

use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class Throattle
{
    public function greet(Request $request)
    {
        $this->rate_limit($request);
    }
    
    public function rate_limit(Request $request)
    {
        $referer = request()->headers->get('referer');
        $limit = $request->limit;
        $quotes = ['“If you don’t risk anything, you risk even more.” —Erica Jong', 
                        '“You can never leave footprints that last if you are always walking on tiptoe.” —Leymah Gbowee',
                        '“If you don’t like the road you’re walking, start paving another one.” —Dolly Parton',
                        '“If it makes you nervous, you’re doing it right.” —Childish Gambino',
                        '“What you do makes a difference, and you have to decide what kind of difference you want to make.” —Jane Goodall',
                        '“I choose to make the rest of my life the best of my life.” —Louise Hay'
        ];
        if($referer && $limit) { 
            $executed = RateLimiter::attempt(
                'send-message:'.$request->ip(),
                $perMinute = $limit,
                function() {
                    echo 'Accessing .. '."<br/><br/>";
                }
            );
            if (! $executed) {
                echo  'Rate limit '.$limit.' exceeded !! Please try after sometime.';
            } else {
                $random_keys=array_rand($quotes);
                echo $quotes[$random_keys];
            }
        } else {
            $random_keys=array_rand($quotes);
            echo $quotes[$random_keys];
        }
    }

}
