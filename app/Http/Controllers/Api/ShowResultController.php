<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Question;
use App\User;
use App\Result;
class ShowResultController extends Controller
{   
	public function showResult(Request $request)
{
	$user =  auth()->user();
    //dd($user);
    if (!$user) {

            return response()->json([
                'success' => false,
                'message' => 'Invalid User'
            ], 400);
        }

        //$data = Question::select('id','category_id','questions','option1','option2','option3','option4')->get();
        //"<pre>".$data; exit;
            $count=Question::count();
            $array=array();
            
            for($i=1;$i<=Question::count();$i++)
            {

            $qus=$request->get('question'.$i.'_id');            
            $ans=$request->get('correct_ans'.$i);  
            $data = Question::select('correct_ans','category_id')->where('id',$qus)->get();
            if(!$data)
            {
            return response()->json([
            'success' => false,
            'data' => 'No such question',
            'stutas' => 400
            ], 400);
            }
            foreach ($data as $value) {
            	$correct_ans=$value->correct_ans;
            	$cat_id=$value->category_id;
            }
            $flag=0;
            if($ans==$correct_ans)
            {
                $flag=1;
            }

            $array[$i-1]=array('user_id'=>$user->id,'question_id'=>$qus,'correct_ans'=>$correct_ans,'user_ans'=>$ans,'category_id'=>$cat_id,'flag'=>$flag);
            //$newarray=array_push($array, var)
            
            }
             Result::insert($array);
            
            return response()->json([
            'success' => true,
            'data' => $array,
            'stutas' => 200
        ], 200);
}
    
}
