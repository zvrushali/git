<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use App\User;
use Stripe;
class SubscriptionController extends Controller
{
    public function create(Request $request, Plan $plan)
    {
    	Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $plan = Plan::findOrFail($request->get('plan'));
        //dd( $plan->stripe_plan);
        $user=User::findOrFail(4);
        $user
            ->newSubscription('Basic',$plan->stripe_plan)->trialDays(15)
               ->create($request->stripeToken);
              $input = @file_get_contents('php://input');
            
            $event_json = json_decode($input,true);
            dd($event_json);
       return redirect()->back()->with('message', 'Data Updated Successfully');
    }


    public function faioledresponce(Request $request)
    {

          //  dd($request->all());
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $input = @file_get_contents('php://input');
            
            $event_json = json_decode($input,true);
            dd($event_json);
    }
}
