@if(!isset(Auth::user()->email))
   <script>window.location = "/Admin";</script>
@endif
<!DOCTYPE html>
@extends('main.layout',array('active3'=>'active','active5'=>'active','title'=>'Admin | Questions'))

@section('content')
<p>Hello</p>
@endsection