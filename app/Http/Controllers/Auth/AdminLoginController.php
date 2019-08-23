<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
 use Route;
 use App\Admin;
class AdminLoginController extends Controller
{

	public  function __construct()
    {

         $this->middleware('guest:admin');
 
    }

  public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
     
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) 
    {
 // if successful, then redirect to their intended location
   return redirect('/Admin');
    }
 // if unsuccessful, then redirect back to the login with the form data
     else
     {

      return back()->with('error', 'Wrong Login Detail');

     }
    }

    public function logout()
   {
   Auth::guard('admin')->logout();
   return redirect('/admin/login');
 }
}
