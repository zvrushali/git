

@if(!isset(Auth::user()->email))
   <script>window.location = "/Admin";</script>
@endif
<!DOCTYPE html>
@extends('main.layout',array('active2'=>'active','title'=>'Admin | User'))

@section('content')


            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->

<div class="container">
    <div class="deletemain text-center alert alert-dismissible alert-success" style="display:none;margin:0 250px">
<a href="#" class="delete close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4 class="delete"></h4>
</div>
</div>
 @if(session()->has('change'))
<div class="container">
    <div class="text-center alert alert-dismissible alert-danger" style="margin:0 250px">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('change') }}
</div>
</div>
@endif
 @if(session()->has('change1'))
<div class="container">
    <div class="text-center alert alert-dismissible alert-success" style="margin:0 250px">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session()->get('change1') }}
</div>
</div>
@endif
<style type="text/css">
    #sample_1
    {
        border:solid 1px blue;
    }
</style>
 <img class="card-img-top" id="loader" src="{{ asset('images/lg.comet-spinner.gif') }}" alt="Card image" style="position:absolute;top:40%;left:50%;width:100" height="100">

             
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
                            <div class="portlet light" style="display: none">
                                <div class="portlet-titleb">
                                    <div class="caption font-dark"><br>
                                        <i class="icon-user font-dark"></i>

                                        <span class="bold uppercase"> User Table</span>
                                    </div>
                                   <br>
                                </div>
                           @if(Auth::user()->role==0)
                                <div class="portlet-body">
                                   
                                    <div class="table-toolbar">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="btn-group">
                                                   
                                                    <a href="{{ url('/Admin/add_user') }}" id="sample_editable_1_new" class="btn sbold btn-primary"> Add New
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                          
                                        </div>

                                    </div>
                                @endif
                                    <table style="width:100%;border:solid 2px #337ab7;" class="table-bordered text-center table table-striped table-hover table-checkable order-column" id="sample_1">
                                        
                                           
            <tr class="" style="background-color:#337ab7;color:white">
                <th class="text-center">Id</th>
                <th class="text-center">First Name</th>
                <th class="text-center" style="width:100px;">Last Name</th>
                <th class="text-center">Email</th>
                <th class="text-center">Gender</th>
                @if(Auth::user()->role==0)
                <th  colspan="3" class="text-center">Actions</th>
                @endif
                
            </tr>
       
 @foreach ($users as $user)
<tr class="row{{ $user->id}}">
        
<td> {{ $user->id}}  </td>
<td> {{ $user->first_name}}  </td>
<td> {{ $user->last_name}}  </td>
<td> {{ $user->email}}  </td>
<td> {{ $user->gender}}  </td>
@if(Auth::user()->role==0)
@if($user->active==0)
<?php
$stutas = "Active";
$class="green";
?>

@else
<?php
$stutas = "Deactive";
$class="dark";
?>
@endif
<td><a href="/status/{{$user->id}}" class="buttons-print btn btn-outline {{ $class }}" style="width:110px"><i class="fa fa-exchange"></i> {{$stutas}}</a></td>
<td><a href="/edit/{{$user->id}}" class="buttons-print btn purple btn-outline" style="width:100px"><i class="fa fa-edit"></i> Edit</a></td>
<td><a href="#" data-toggle="modal" data-target="#myModal" class="buttons-print btn red btn-outline" style="width:100px"><i class="fa fa-trash"></i> Delete</a>
        <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header" style="background-color: #DE7868">
          <h4 class="modal-title">Delete Record</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h4>Are you sure ! You Want to Delete data</h4>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer" style="background-color: #DE7868">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <button  type="button" value="{{$user->id}}"  class="btn btn-danger deleteRecord">Delete</button>
          <button type="button" data-dismiss="modal"  class="btn btn-success">Cancle</button>
        
        </div>
        
      </div>
    </div>
  </div>

</td></td>
@endif
</tr>

 @endforeach

                                    
                                    </table>
                                     {{ $users->links() }}
                                </div>
                            </div>
                          
                            <!-- END EXAMPLE TABLE PORTLET-->
                        </div>
                  
<div class="clearfix"></div>
<script
              src="https://code.jquery.com/jquery-3.4.1.js"
              integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
              crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">

   
    $(".deleteRecord").click(function(){
   // alert("hello");
    var id = $(this).val();
   // alert(id);
    var token = $("meta[name='csrf-token']").attr("content");
  
    //alert(token);
     
    $.ajax(
    {


        url: "/delete/"+id,

        type: 'get',

        data: {

            "id": id,

            "_token": token,
      },
      
        success: function (){
      //  alert("Record Deleted");
         $('.row' + id).remove();
        $(".modal-backdrop").remove();
       
        $('.deletemain').css("display", "block");
         $('.deletemain h4').text('User deleted Successfully');
        
        }

    });
   $(".modal-backdrop").remove();

});


window.onload = function () {
$('#loader').fadeOut(500, function(){ $('#loader').remove(); 
 $('.portlet').fadeIn(500);
});
 
}



</script>
       

@endsection

