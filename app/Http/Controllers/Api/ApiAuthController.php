<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller; 
use App\user; 
use App\Student;
use Illuminate\Support\Facades\Auth; 
use Validator;

class ApiAuthController extends Controller
{

   public $successStatus = 200;

   public function login(Request $request){ 
   //echo "<pre>";echo $request->get('password');exit;
   if(Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])){ 
   $data =User::where('email',$request->email)->first();
   $success['token'] =  $data->createToken('loginToken')-> accessToken; 
  // dd($success['token']);
   $postArray = ['api_token' => $success['token']];
    User::where('email',$request->get('email'))->update($postArray);
    return response()->json(['success' => $success], $this-> successStatus); 
  } else{ 
   return response()->json(['error'=>'invalid User'], 401); 
   } 
}

  public function logout(Request $request)
    {
        $request->user()->token()->revoke();        
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
?>
