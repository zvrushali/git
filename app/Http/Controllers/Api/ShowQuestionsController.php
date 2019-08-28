<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Question;
use App\User;
class ShowQuestionsController extends Controller
{
    public function showQuestion(Request $request)
    {
     // $token = $request->header('Authorization');
     $user =  auth()->user();
      //dd($data);
    
       if (!$user) {

            return response()->json([
                'success' => false,
                'message' => 'Invalid User'
            ], 400);
        }

        $data = Question::select('id','category_id','questions','option1','option2','option3','option4')->get();
        //"<pre>".$data; exit;
        return response()->json([
            'success' => true,
            'data' => $data,
            'stutas' => 200
        ], 200);
    }
}
