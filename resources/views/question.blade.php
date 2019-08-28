@if(!isset(Auth::user()->email))
   <script>window.location = "/Admin";</script>
@endif
<!DOCTYPE html>
@extends('main.layout',array('active3'=>'active','active5'=>'active','title'=>'Admin | Questions'))

@section('content')

  <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
 
<style type="text/css">
    #sample_1
    {
        border:solid 1px blue;
    }
</style>
@if(session()->has('success'))
<div class="container">
    <div class="text-center alert alert-dismissible alert-success" style="margin:0 250px">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('success') }}
    </div>
</div>
@endif
<ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="#">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Dashboard/</span>
                        </li>
                        <li>
                            <span class="active">Users</span>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light">
                                <div class="portlet-titleb">
                                    <div class="caption font-dark"><br>
                                        <i class="icon-user font-dark"></i>

                                        <span class="bold uppercase"> Question Table</span>
                                    </div>
                                   <br>
                                </div>
                          @if(Auth::user()->role==1)
                                <div class="portlet-body">
                                   
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                   
                                                    <a href="{{ url('/Admin/add_question_form') }}" id="sample_editable_1_new" class="btn sbold btn-primary"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                          
                                        </div>

                                    </div>
                                @endif  
                                <table style="width:100%;border:solid 2px #337ab7" class="table-bordered text-center table table-striped table-hover table-checkable order-column" id="sample_1">
                                        
                                           
            <tr class="" style="background-color:#337ab7;color:white">
                <th class="text-center">Id</th>
                <th class="text-center">Question</th>
                <th class="text-center">Category</th>
                <th class="text-center">Option 1</th>
                <th class="text-center">Option 2</th>
                <th class="text-center">Option 3</th>
                <th class="text-center">Option 4</th>
                <th class="text-center">Correct Answer</th>
                @if(Auth::user()->role==1)
                <th  colspan="2" class="text-center">Action</th>
                @endif
                
           </tr>
            @foreach ($users as $user)
<tr>
        
<td> {{ $user->id}}  </td>
<td> {{ $user->questions}}  </td>
<td> {{ $user->Category->name}}  </td>
<td> {{ $user->option1}}  </td>
<td> {{ $user->option2}}  </td>
<td> {{ $user->option3}}  </td>
<td> {{ $user->option4}}  </td>
<td> {{ $user->ans}}  </td>

@if(Auth::user()->role==1)
<td><a href="/edit_questions/{{$user->id.','.$user->Category->id}}" class="buttons-print btn purple btn-outline" style="width:100px"><i class="fa fa-edit"></i> Edit</a></td>
<td><a href="/delete_questions/{{$user->id}}" class="buttons-print btn red btn-outline" style="width:100px"><i class="fa fa-trash"></i> Delete</a></td>
@endif
</tr>
 @endforeach

@endsection



