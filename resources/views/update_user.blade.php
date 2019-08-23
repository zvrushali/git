@extends('main.layout',array('active2'=>'active','title'=>'Admin | User'))

@section('content')
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
                                                    <i class="fa fa-user" style="font-size: 20px;"></i>&nbsp;<b>Add New User </b></div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                   
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form action="{{url('Admin/edit/'.$users['id'])}}" class="form-horizontal" method="post">
                                                	{{ csrf_field() }}
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">First Name</label>
                                                            <div class="col-md-7">
                                                            <div class="input-group">
                                                               <span class="input-group-addon input-lg input-circle-left {{ $errors->has('first_name') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-user "></i>
                                                                    </span>
                                                                    <input type="text" class="form-control input-lg input-circle-right {{ $errors->has('first_name') ? 'has-error' :'' }}" placeholder="First Name" name="first_name" value={{$users['first_name']}}>
                                                                </div>
                                                                <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('first_name') }}</b></span>
                                                    </div>

                                                               
                                                        </div>


                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Last Name</label>
                                                            <div class="col-md-7">
                                                            <div class="input-group">
                                                               <span class="input-group-addon input-lg input-circle-left {{ $errors->has('last_name') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                    <input type="text" class="form-control input-lg input-circle-right {{ $errors->has('last_name') ? 'has-error' :'' }}" value={{$users['last_name']}} placeholder="Last Name" name="last_name">
                                                                   
                                                                </div>
                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('last_name') }}</b></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Email Address</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-lg input-circle-left {{ $errors->has('email') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-envelope"></i>
                                                                    </span>
                                                                    <input type="email" class="form-control input-lg input-circle-right {{ $errors->has('email') ? 'has-error' :'' }}" placeholder="Email Address" name="email" value={{$users['email']}}>
                                                                </div>
                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('email') }}</b></span>

                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Password</label>
                                                            <div class="col-md-7">
                                                                <div class="input-group">
                                                                	<span class="input-group-addon input-lg input-circle-left {{ $errors->has('password') ? 'has-error' :'' }}">
                                                                        <i class="fa fa-key"></i>
                                                                    </span>
                                                                    <input type="text" class="input-lg form-control input-circle-right {{ $errors->has('password') ? 'has-error' :'' }}" value={{$users['password']}} placeholder="Password" name="password">
                                                                    
                                                                </div>
                                                                 <span class="text-danger"><b>&nbsp; &nbsp;{{ $errors->first('password') }}</b></span>
                                                            </div>
                                                        </div>
                                                     

                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label">Gender</label>
                                                            
                                                            <div class="col-md-7">
                                                              <div class="radio">
                                                              	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input {{
                                                              	$users['gender'] =='Female' ? "checked" : "" }} type="radio"  name="gender" value="Female"  >&nbsp; Female&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                              	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="Male" {{
                                                              	$users['gender'] =='Male' ? "checked" : "" }}> &nbsp;Male
                                                              </div>
                                                          </div>
                                                            </div>
                                                       
                                                      	
                                                      
                                                       
                                                
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn btn-circle green">Submit</button>
                                                                <input type="reset" class="btn btn-circle grey-salsa btn-outline" value="Cancel">
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