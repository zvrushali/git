@if(!isset(Auth::user()->email))
   <script>window.location = "/Admin";</script>
@endif
<!DOCTYPE html>
@extends('main.layout',array('active3'=>'active','active5'=>'active','title'=>'Admin | Add Question'))

@section('content')
<style type="text/css">
	.has-error
	{
		border:solid red 1px;
	}
	span.has-error
	{
		background: pink;
	}
</style>

  <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content" style="margin-bottom: 30px;">
                    <!-- BEGIN PAGE HEAD-->
@if(session()->has('message'))
<div class="container">
   <div class="text-center alert alert-dismissible alert-success" style="margin:0 150px">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
</div>
@endif
  <br>   
 <div class="tab-content">
                                    <div class="tab-pane active" id="tab_0" style="margin-top: -30px;">
                                        <div class="portlet box green" style="margin:0 100px">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user" style="font-size: 20px;"></i>&nbsp;<b>Add New Question</b></div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                   
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="{{url('/add_question_insert')}}" class="form-horizontal" method="post">
                                                	{{ csrf_field() }}
                                                    <div class="form-body">
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Category Name</label>
                                                            <div class="col-md-7">
                                                            <div class="input-group">
                                                               <span class="input-group-addon  input-circle-left {{ $errors->has('category') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-list"></i>
                                                                    </span>
                                                                    <select name="category" class="form-control input-circle-right {{ $errors->has('category') ? 'has-error' :'' }}"" placeholder="Select Category">
                                                                     @foreach($users as $user)
                                                                     
                                                                       <option value="{{$user->id}}">{{$user->name}}</option>
                                                                     @endforeach
                                                                   
                                                                </select>
                                                                </div>
                                                                <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('category') }}</b></span>
                                                            </div>

                                                               
                                                        </div>
                                                           <div class="form-group">
                                                            <label class="col-md-3 control-label">Question</label>
                                                            <div class="col-md-7">
                                                            <div class="input-group">
                                                               <span class="input-group-addon input-circle-left {{ $errors->has('question') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-question "></i>
                                                                    </span>
                                                                    <textarea class="form-control  input-circle-right {{ $errors->has('question') ? 'has-error' :'' }}" placeholder="Question" name="question"></textarea>
                                                                                                                                    </div>
                                                                <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('question') }}</b></span>
                                                            </div>

                                                               
                                                        </div>
                                                        


                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Option 1</label>
                                                            <div class="col-md-7">
                                                            <div class="input-group">
                                                               <span class="input-group-addon  input-circle-left {{ $errors->has('option1') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-clipboard"></i>
                                                                    </span>
                                                                    <input id="option1" type="text" class="form-control input-circle-right {{ $errors->has('option1') ? 'has-error' :'' }}" placeholder="Option 1" name="option1">
                                                                  
                                                                </div>

                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('option1') }}</b></span> 
                                                            </div>
                                                            <div class="col-md-2">
                                                                <input id="option1" type="radio" name="radio" value="option1">
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Option 2</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon  input-circle-left {{ $errors->has('option2') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-clipboard"></i>
                                                                    </span>
                                                                    <input id="option2" type="text" class="form-control input-circle-right {{ $errors->has('option2') ? 'has-error' :'' }}" placeholder="Option2" name="option2">
                                                                </div>
                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('option2') }}</b></span>

                                                            </div>
                                                             <div class="col-md-2">
                                                                <input type="radio" name="radio" value="option2">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Option 3</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                	<span class="input-group-addon  input-circle-left {{ $errors->has('option3') ? 'has-error' :'' }}">
                                                                       <i class="fa fa-clipboard"></i>
                                                                    </span>
                                                                    <input id="option3" type="text" class="form-control input-circle-right {{ $errors->has('option3') ? 'has-error' :'' }}" placeholder="Option 3" name="option3">
                                                                    
                                                                </div>
                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('option3') }}</b></span>
                                                            </div>
                                                             <div class="col-md-2">
                                                                <input type="radio" name="radio" value="option3">
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="col-md-3 control-label">Option 4</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                	<span class="input-group-addon  input-circle-left {{ $errors->has('option4') ? 'has-error' :'' }}">
                                                                      <i class="fa fa-clipboard"></i>
                                                                    </span>
                                                                    <input id="option4" type="text" class="form-control input-circle-right {{ $errors->has('option4') ? 'has-error' :'' }}" placeholder="Option 4" name="option4">
                                                                    
                                                                </div>
                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('option4') }}</b></span>
                                                            </div>
                                                             <div class="col-md-2">
                                                                <input type="radio" name="radio" value="option4">
                                                            </div>
                                                        </div>

                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Correct Answer</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-circle-left {{ $errors->has('ans') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-check"></i>
                                                                    </span>
                                                                    <input id="ans" type="text" class="form-control input-circle-right {{ $errors->has('ans') ? 'has-error' :'' }}" placeholder="Correct Answer" name="ans" readonly>
                                                                    
                                                                </div>
                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('ans') }}</b></span>
                                                            </div>
                                                             <div class="col-md-2">
                                                               
                                                            </div>
                                                        </div>
                                                      
                                                      
                                                       
                                                
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-circle green">Submit</button>
                                                                <button type="reset" class="btn btn-circle grey-salsa btn-outline">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
       

@endsection
@section('assets')
 <script src= 
"https://code.jquery.com/jquery-2.2.4.min.js"> 
  </script> 

  <script type="text/javascript">
      $("input[name='radio']").click(function(){
        $data=$('input:radio[name=radio]:checked').val();
        $ans=$('#'+$data).attr('id');
       // alert($ans);
        $('#ans').val($ans);
        
      });
  </script>

@endsection