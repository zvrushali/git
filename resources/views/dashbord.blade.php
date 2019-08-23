@if(!isset(Auth::user()->email))
   <script>window.location = "/Admin";</script>
@endif
<!DOCTYPE html>
@extends('main.layout',array('active1'=>'active','title'=>'Admin | Dashbord'))
@section('content')

            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                       
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                       
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Dashboard</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                                <div class="visual">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$data1}}">0</span>
                                    </div>
                                    <div class="desc"> Total User </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                                <div class="visual">
                                    <i class="fa fa-bar-chart-o"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$data2}}">0</span></div>
                                    <div class="desc"> Active User </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 green" href="#">
                                <div class="visual">
                                    <i class="fa fa-shopping-cart"></i>
                                </div>
                                <div class="details">
                                    <div class="number">
                                        <span data-counter="counterup" data-value="{{$data3}}">0</span>
                                    </div>
                                    <div class="desc"> New Users </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number"> 
                                        <span data-counter="counterup" data-value="{{$data4}}"></span></div>
                                    <div class="desc"> Total Questions </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="row">
                   <div class="col-md-6">
                   <div class="panel panel-default">
                   <div class="panel-heading">Active User</div>
                
                    
                     {!!$pie1->html() !!}
                
             </div>
         </div>
           <div class="col-md-6">
                   <div class="panel panel-default">
                   <div class="panel-heading">New User</div>
                 
                     {!!$pie2->html() !!}
                 </div>
                </div>
</div>
                <hr>
               </div> 
            </div>
{!! Charts::scripts() !!}
{!! $chart->script() !!} 
{!! $pie1->script() !!}
{!! $pie2->script() !!}
    @endsection