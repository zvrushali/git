<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\Http\Controllers\Controller;
 use Auth;
 use Route;
 use App\Admin;

class AdminController extends Controller

{

    
 public function __construct()
 {

 $this->middleware('guest:admin')->except('logout');
  //dd('Hello');	
 }

public function showLoginForm()
 {

 return view('adminlogin');
 }

public function login(Request $request)
 {
 // Validate the form data


// Attempt to log the user in
 if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
 	
 // if successful, then redirect to their intended location
   return redirect('/Admin/dashbord');
 }
 // if unsuccessful, then redirect back to the login with the form data
 else
     {

      return back()->with('error', 'Wrong Login Detail');
     }
 }
 public function homelogin()
    {
     if(auth()->user())
     {
     	 return view('dashbord');
     }
    
    }
public function logout()
 {
 Auth::guard('admin')->logout();
 return redirect('/Admin');
 }
}