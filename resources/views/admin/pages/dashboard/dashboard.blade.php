@extends('admin.layouts.app')
@section('title')
<title>Admin | Dashboard</title>

@endsection
@section('left_part')
@include('admin.include.left_part')
@endsection
@section('content')

	
	
 <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="pull-left page-title">Welcome !</h4>
                            <ol class="breadcrumb pull-right">
                                <li><a href="#">DEEEP OCEAN</a></li>
                                <li class="active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                    <!-- Start Widget -->
                    <div class="row">
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-info"><i class="icofont-list"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{@$course}}</span> Total Active Course </div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-warning"><i class="icofont-tasks-alt"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{@$subject}}</span> Total Active Subject </div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-pink"><i class="fas fa-file-video"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{@$paper}}</span> Total Active Paper </div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-success"><i class="far fa-question-circle"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{@$success_paid}}</span> Total Success Payment</div>
                            </div>
                        </div>
                        <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-info"><i class="   fas fa-share-alt-square"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{@$adv}}</span> Total Active Advisory </div>
                            </div>
                        </div>
                         <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-info"><i class="   fas fa-share-alt-square"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{@$pro}}</span> Total Active Product </div>
                            </div>
                        </div>
                         <div class=" col-lg-4 col-md-6 col-sm-6">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-info"><i class="   fas fa-share-alt-square"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">{{@$insp}}</span> Total Active Inspiration </div>
                            </div>
                        </div>

                        
                       {{--  <div class="col-md-6 col-sm-6 col-lg-3">
                            <div class="mini-stat clearfix bx-shadow bg-white"> <span class="mini-stat-icon bg-success"><i class="fa fa-eye"></i></span>
                                <div class="mini-stat-info text-right text-dark"> <span class="counter text-dark">20544</span> New Visitors </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- end row -->
                </div>
                <!-- container -->
            </div>
            <!-- content -->
           
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->


@section('footer')
@include('admin.include.footer')
@endsection
@endsection
{{-- end content --}}


@section('script')
@include('admin.include.script')

@endsection