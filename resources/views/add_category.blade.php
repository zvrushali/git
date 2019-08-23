@if(!isset(Auth::user()->email))
   <script>window.location = "/Admin";</script>
@endif
<!DOCTYPE html>
@extends('main.layout',array('active3'=>'active','title'=>'Admin | Add User'))

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
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
@if(session()->has('message'))
<div class="container">
    <div class="text-center alert alert-dismissible alert-success" style="margin:0 250px">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('message') }}
    </div>
</div>
@endif
  <br>   
 <div class="tab-content">
                                    <div class="tab-pane active" id="tab_0">
                                        <div class="portlet box green" style="margin:0 200px">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-user" style="font-size: 20px;"></i>&nbsp;<b>Add New category</b></div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                   
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="{{url('/add_category_insert')}}" class="form-horizontal" method="post">
                                                	{{ csrf_field() }}
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Category Name</label>
                                                            <div class="col-md-7">
                                                            <div class="input-group">
                                                               <span class="input-group-addon input-lg input-circle-left {{ $errors->has('category') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-user "></i>
                                                                    </span>
                                                                    <select name="category" class="form-control input-lg input-circle-right {{ $errors->has('category') ? 'has-error' :'' }}"">
                                                                    <option value="General Knowledge">General Knowledge<option>
                                                                    <option value="Science">Science</option>
                                                                    <option value="History">History </option>
                                                                    <option value="Sport">Sport</option>
                                                                    <option value="Maths">Maths</option>
                                                                    <option value="Politices">Politices</option>
                                                                </select>
                                                                </div>
                                                                <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('category') }}</b></span>
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