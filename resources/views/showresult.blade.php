@if(!isset(Auth::user()->email))
   <script>window.location = "/Admin";</script>
@endif
<!DOCTYPE html>
@extends('main.layout',array('title'=>'Admin | Result'))

@section('content')
  <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="margin-bottom: 30px;">
<div class="container" style="margin-left:00px;">
<div class="row">
<h3 class="text-warrning">Your Test Result </h3>
{!! Form::open(array('route' => 'users.result','method'=>'POST','files'=>true)) !!}
 <div class="col-xs-3 col-sm-3 col-md-3">
        <div class="form-group">
            <strong>Select Test Date:</strong>
            {!! Form::date('date', null, array('placeholder' => 'Select Date','class' => '')) !!}
        </div>
    </div>
     <div class="col-xs-2 col-sm-2 col-md-2 text-left">
        <button name="btn" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
{!! Form::close() !!}
@if(isset($_POST['btn']))
 <table style="width:95%;border:solid 2px #337ab7" class="table-bordered text-center table table-striped table-hover table-checkable order-column" id="sample_1">
                                        
 @if($data->isEmpty())
 <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Sorry!</strong> You did not attempt test for this date
  </div>
<div><h3 class="text-danger"></h3></div>
@else                           
            <tr class="" style="background-color:#337ab7;color:white">
                <th class="text-center">Sr. No. </th>
                <th class="text-center">Question</th>
                <th class="text-center">Given Ans</th>
                <th class="text-center">Correct Ans</th>
                <th class="text-center">Marks</th>
              
            </tr>

<?php $count=0?>
@foreach ($data as $d) 

<tr>
	<td>{{$d->id}}</td>
	<td>{{$d->Question->questions}}</td>
	<td>{{$d->user_ans}}</td>
	<td>{{$d->correct_ans}}</td>
	<td>{{$d->flag}}</td>
@if($d->flag==1)
<?php $count++?>
@endif
</tr>       
@endforeach
</table>
<div><h2 class="text-primary">Your Total scroe is {{$count}}</h2></div>
<a href="/Export" class="btn btn-success">Export to .xlsx</a>
<a href="/export/xls" class="btn btn-primary">Export to .xls</a>
@endif
@endif
</div>
</div>
</div>
@endsection