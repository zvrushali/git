<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use App\Repository\UserInterfaceRepository;
use App\Http\Requests\NewUserRequest;
use App\Http\Requests\updateRequest;
use App\User;
use App\Category;
use App\Question;
use App\Result;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\ResultsExport;

use Charts;

class MainController extends Controller

{   
    protected $data;
 
    public function __construct(UserInterfaceRepository $data) {
        $this->data = $data;


    }
    public function index()
    {

     return view('adminlogin');
    }
    
    public function export()
    {
        return Excel::download(new ResultsExport, 'users1.csv' );
    }

    public function checklogin(Request $request)
    {
    

       $user_data = array(
      'email'  => $request->get('email'),
      'password' => $request->get('password')
     );
      // echo '<pre>';print_r($user_data);exit;
     //dd($user_data);
     if(Auth::attempt($user_data))
     {
      $data =User::where('email',$request->email)->first();
      if($data->is_admin())
      {
          
         return redirect('Admin/dashbord');
      }
         return redirect('User/dashbord');
     }
     else
     {
      return back()->with('error', 'Wrong Login Details');
     }

    }

    public function homelogin()
    {
           auth()->user();
       //  dd(Auth::user());
          $data1=User::where('role',3)->get();
          $data2= User::where('role',3)->where('active',1)->get();
          $data3= User::where('role',3)->whereDate('created_at',Date('Y-m-d'))->get();
        //  dd(count($data3));
         $chart = Charts::database($data1, 'bar', 'highcharts')
            ->title("Monthly new Register Users")
            ->elementLabel("Total Users")
            ->dimensions(600, 500)
            ->responsive(false)
            ->groupByMonth(date('Y'), true);
           $pie1 =  Charts::create('pie', 'highcharts')
            ->title('Active User')
            ->labels(['Total User', 'Active User'])
            ->values([count($data1),count($data2)])
            ->colors(['#3598dc', '#e7505a'])
            ->dimensions(600,400)
            ->responsive(false);
            $pie2  =  Charts::create('pie', 'highcharts')
            ->title('New User')
            ->labels(['Total User','New User'])
            ->values([count($data1),count($data3)])
            ->colors(['#3BCBC6', '#ABB1B1'])
            ->dimensions(500,400)
            ->responsive(false);
         return view('dashbord',['chart'=>$chart,'pie1'=>$pie1,'pie2'=>$pie2,'data1'=>count($data1),'data2'=>count($data2),'data3'=>count($data3),'data4'=>count(Question::all())]);;
    }

    function userlogin()
    {
   //   auth()->user();
     // dd(auth()->user()->id);
      //$data=User()->result;
  //    $data=Result::with('Question')->where('user_id',4)->get();
     // dd(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"));
      
        return view('showresult');
    
      //$count=Question::with('Result')
      
    }
    public function userresult(Request $request)
    {
      auth()->user();
      $date= $request->date;
     // dd($date);
      $data=Result::with('Question')->whereDate('created_at',$date)->where('user_id',auth()->user()->id)->get();
     // dd($data);
       return view('showresult',compact('data'));
    }
    function logout()
    {
       auth()->user();
     Auth::logout();
     return redirect('/');
    }

    public function authenticate($r)
    {
      
      if(auth()->user()->role!==$r)
      {
      Auth::logout();
      return redirect('Admin')->with('warnning', 'You are not authorized for action');
      }
     
    }

    public function user_page()
    {
    auth()->user();
    $users =User::where('role',3)->paginate(5);
   

     return view('view_user',compact('users'));   
    }
   
    public function view_user()
    {
               
       
    }


    public function add_user()
    {
        
       $role=0;
      // $this->authenticate($role);
        auth()->user();
       return view('add_user');
    }

    public function insert(NewUserRequest $request)
    {
       // $this->data->insert($request);
     //  $validated = $request->validated();
     $role=0;
      auth()->user();
    // $this->authenticate($role);
     $user = new User();
     $user->first_name = request('first_name');
     $user->last_name = request('last_name');
     $user->email = request('email');
     $user->password = bcrypt(request('password'));
     $user->gender = request('gender');
     $imageName=request()->file;
     $file=request()->file('photo');
     //dd($file);
     if (request()->file('photo')->isValid()) {
          $ext =  time().'.'.request()->photo->getClientOriginalExtension();
          request()->photo->move(public_path('images'), $ext);
      }
      $user->photo = $ext;
     $user->save();
     return redirect()->back()->with('message', 'Register Successfully');
 
    
       
    }


    public function get($id)
    {        $role=0;
            auth()->user();
      //   $this->authenticate($role);
         // $users = user_detail::find($id);
          $users= $this->data->get($id);
          return view('update_user',compact('users'));

          
    }

    public function update(UpdateRequest $request,$id)
    {
        //$validated = $request->validated();
       $role=0;
        auth()->user();
      // $this->authenticate($role);
        $this->data->update($id,$request);
        return redirect()->back()->with('message', 'Data Updated Successfully');
    }
   
    public function delete($id)
    {
        $role=0;
        auth()->user();
        //dd('hello');
       //$this->authenticate($role);
        $this->data->delete($id);
        
       return response()->json([
        'success' => 'Record deleted successfully!'

    ]);
    }


   public function status($id)
   {

    $role=0;
     auth()->user();
    //$this->authenticate($role);
    $data=User::select('active')->where('id', $id)->get();
   
    foreach($data as $d)
    {
       if($d['active']==1)
       {
       
        User::where('id', $id)->update(['active' => 0]);
        return redirect()->back()->with('change', 'This user is Deactived');
       }

       else
       {
        User::where('id', $id)->update(['active' => 1]);
        return redirect()->back()->with('change1', 'This user is Activated');
       }
    }

   }

   public function category()

   {
      auth()->user();
     $users =category::paginate(4);
     return view('category',compact('users')); 
   }

   public function add_category_form()
   {
       $role=1;
        auth()->user();
       //$this->authenticate($role);
     //   auth()->user();
       return view('add_category');
    
   }


   public function add_category_insert(Request $request)
  
   {  
     $role=1;
     //$this->authenticate($role);
    auth()->user();
        $this->validate($request,[

          'category' => 'required|unique:categories,name',

        ]);

        $user = new category();
       $user->name = request('category');
    
     $user->save();

       return redirect()->back()->with('message', 'Register Successfully');
   
    
   }

   public function edit_category_form($id)
   {
           $role=1;
            auth()->user();
        //   $this->authenticate($role);
          $users=category::find($id);
          return view('edit_category',compact('users'));
   }

   public function edit_category_insert(Request $request,$id)
   {

       $role=1;
        auth()->user();
     //$this->authenticate($role);
      $this->validate($request,[

          'category' => 'required|unique:categories,name,'.$id


      ]);
     $device = category::find($id);
     $device->update([
    "name" => $request->input('category')
     ]);
     return redirect('Admin/category')->with('success', 'Data Updated Successfully');
   }

   public function delete_category($id)
   {
       $role=1;
        auth()->user();
      //$this->authenticate($role);
      $model = category::find($id);
      $model->delete();
      return redirect()->back()->with('success','Record Deleleted');

   }

    public function question()

   {
      auth()->user();
     $users= Question::with('category')->get();

     foreach ($users as $key ) {
     // echo $key;
       # code...
     }

    return view('question',compact('users')); 
   }

   public function add_question_form()
   {
     $role=1;
      auth()->user();
     //$this->authenticate($role);
    $users =category::all()->where('deleted_at',null);
    return view('add_question_form',compact('users'));
   }

   public function add_question_insert(Request $request)


   {
           auth()->user();
          $this->validate($request,[

          'category' => 'required',
          'question' => 'required',
          'option1'  => 'required',
          'option2'  =>  'required',
          'option3'  =>'required',
          'option4' =>  'required',
          'ans' => 'required',
        ]);

        $user = new Question();
        $user->questions = request('question');
        $user->category_id = request('category');
        $user->option1 = request('option1');
        $user->option2 = request('option2');
        $user->option3 = request('option3');
        $user->option4 = request('option4');
        $user->ans = request('ans');
    
         $user->save();

      return redirect('Admin/question')->with('success', 'Data Added Successfully');
   }


   public function join()
   {
     $user= Question::with('category')->get();
    //$user= Category::find(1)->questions;
    foreach ($user as $key) 
    {


      echo $key['Category']['name'];


   }
  }

  public function delete_question($id)
  {
      $role=1;
       auth()->user();
      //$this->authenticate($role);
      $model = Question::find($id);
      $model->delete();
      return redirect()->back()->with('success','Record Deleleted');

  }
   

   public function edit_questions($id)
   {
       $role=1;
        auth()->user();
       //$this->authenticate($role);
      $new_array = explode(',',$id);

      $cat=Category::find($new_array[1]);
      $users =category::all()->where('deleted_at',null);
      $qus=Question::find($new_array[0]);

     return view('edit_questions',compact('users','cat','qus'));
 }

 public function edit_question_insert(Request $request,$id)
 {
    $role=1;
     auth()->user();
     //$this->authenticate($role);
     $this->validate($request,[

          'category' => 'required',
          'question' => 'required',
          'option1'  => 'required',
          'option2'  =>  'required',
          'option3'  =>'required',
          'option4' =>  'required',
          'ans' => 'required',
    ]);
     $device = Question::find($id);
     $device->update([
    "questions" => $request->input('category'),"option1"=>$request->input('option1'),"option2"=>$request->input('option2'),
    "option3"=>$request->input('option3'),"ans"=>$request->input('ans'),"option4"=>$request->input('option4'),
     ]);
     return redirect('Admin/question')->with('success', 'Data Updated Successfully');
 }
public function unauth()
{
  return view('unauthorized')->with('role');
}
}
