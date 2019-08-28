<?php

   

namespace App\Http\Controllers;

   

use Illuminate\Http\Request;

use Session;

use Stripe;
use Auth;
use App\Payment;

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {

        return view('stripe');

    }

  

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {
        auth()->user();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
       // dd($request->stripeToken);
        $token=$request->stripeToken;
        $customer = \Stripe\Customer::create([
       'name' => 'User',
       'source' => $token,
       "description" => "Example customer"
    ]);



       $charge= Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                //"source" => $token,
                'customer' => $customer->id,

        ]);
      $user = new Payment();
      $user->user_id =  auth()->user()->id;
      $user->stripe_cid =$charge->source->customer;
      $user->card_last4_digit = $charge->source->last4;
      $user->save();
      Session::flash('success', 'Payment successful!');

          

      return back();

    }


    public function getStripeId()

    {  
         auth()->user();
        $customer=0;
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $users =Payment::where('user_id',auth()->user()->id)->get();
      //  dd($users);
        foreach ($users as $value) {
         $s_id= $value->stripe_cid;
        }
       // dd($s_id);
        try {
        $customer = \Stripe\Customer::retrieve($s_id);
        }
          catch(\Stripe\Error\Card $e) {
  // Since it's a decline, \Stripe\Error\Card will be caught
         $body = $e->getJsonBody();
         $err  = $body['error'];

         print('Status is:' . $e->getHttpStatus() . "\n");
         print('Type is:' . $err['type'] . "\n");
         print('Code is:' . $err['code'] . "\n");
  // param is '' in this case
         print('Param is:' . $err['param'] . "\n");
         print('Message is:' . $err['message'] . "\n");
         } 
         catch (\Stripe\Error\RateLimit $e) {
  // Too many requests made to the API too quickly
         } 
        catch (\Stripe\Error\InvalidRequest $e) {
  // Invalid parameters were supplied to Stripe's API
        } catch (\Stripe\Error\Authentication $e) {
  // Authentication with Stripe's API failed
  // (maybe you changed API keys recently)
        } catch (\Stripe\Error\ApiConnection $e) {
  // Network communication with Stripe failed
        } catch (\Stripe\Error\Base $e) {
  // Display a very generic error to the user, and maybe send
  // yourself an email
      } catch (Exception $e) {
  // Something else happened, completely unrelated to Stripe
}
       if($customer!==0)
        {
         // dd($customer->sources->data[0]);
         return view('old_user_stripe',compact('customer'));

        }
        else
        {
          return view('stripe');

        }
       
    
        
      
    }


    public function oldPayment($id)
    {

      auth()->user();
      Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
      $charge= Stripe\Charge::create ([
                "amount" => 100 * 100,
                "currency" => "usd",
                //"source" => $token,
                'customer' => $id,

        ]);
      return redirect()->back()->with('success', 'Payment Successfully');

    }
    public function old()
    {
      auth()->user();
      return view('old_user_stripe');
    }

    public function getUser()
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $cards = \Stripe\Customer::allSources(
       'cus_FaIAWkm5hTFeAR',
       [
      'limit' => 3,
      'object' => 'card',
       ]
       );
      echo  "<pre>"; print_r($cards);
    }

}