<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
class PlanController extends Controller
{
    
public function index()
{
        $plans = Plan::all();
        return view('plans', compact('plans'));
}


public function show(Plan $plan, Request $request)
{
     return view('showplans', compact('plan'));
}
}
