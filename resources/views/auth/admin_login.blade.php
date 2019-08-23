@extends('layouts.app')

@section('content')
 <div class="container">
 <div class="row justify-content-center">
 <div class="col-md-8">
 <div class="card">
 <div class="card-header"></div>
 @if ($message = Session::get('error'))
   <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
   </div>
   @endif
<div class="card-body">
 <form method="POST" action="{{ url('/check') }}">
 @csrf

<div class="form-group row">
 <label for="email" class="col-sm-4 col-form-label text-md-right"></label>

<div class="col-md-6">
 <input id="email" type="email" class="form-control" name="email" value="">

 </div>
 </div>

<div class="form-group row">
 <label for="password" class="col-md-4 col-form-label text-md-right"></label>

<div class="col-md-6">
 <input id="password" type="password" class="form-control" name="password">

 </div>
 </div>

<div class="form-group row">
 <div class="col-md-6 offset-md-4">
 <div class="checkbox">
 <label>
 <input type="checkbox" name="remember" > 
 </label>
 </div>
 </div>
 </div>

<div class="form-group row mb-0">
 <div class="col-md-8 offset-md-4">
 <button type="submit" class="btn btn-primary">
 Submit
 </button>

<a class="btn btn-link" href="">
 
 </a>
 </div>
 </div>
 </form>
 </div>
 </div>
 </div>
 </div>
 </div>
 @endsection