@extends('admin.layouts.app')
@section('title')
<title>Admin | View details</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
{{-- for datepicker --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')

<!-- Start right Content here -->
<!-- ============================================================== -->
  <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
                    
                    <div class="wraper container-fluid">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Details Page</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
                                   
                                    <li class="active">Details Page</li>
                                </ol>
                            </div>
                        </div>
                        <div class="add-btn "><a href="{{route('paid.users')}}"><i class="icofont-minus-circle"></i> back</a></div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                
                                <div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Personal Information</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <div class="about-info-p">
                                                        <strong>Customer Name</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->customerName}}</p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Mobile</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->mobile}}</p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Email</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->email}}</p>
                                                    </div>
                                                      <div class="about-info-p m-b-0">
                                                        <strong>DOB</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->dob}}</p>
                                                    </div>
                                                     <br>
                                                     

                                                      <div class="about-info-p">
                                                        <strong>User Provided Transaction Type</strong>
                                                        <br>
                                                        <p class="text-muted">@if(@$details->getUserDetails->trans_type=="PPY")
                                                            PhonePe Number
                                                            @elseif(@$details->getUserDetails->trans_type=="GPY")
                                                            GPay Number

                                                            @elseif(@$details->getUserDetails->trans_type=="PTM")
                                                            Paytm Number

                                                            @elseif(@$details->getUserDetails->trans_type=="BNK")
                                                            Bank

                                                            @elseif(@$details->getUserDetails->trans_type=="UPI")

                                                            UPI ID

                                                            @else
                                                            N/A

                                                            @endif
                                                        </p>
                                                    </div>

                                                      <div class="about-info-p">
                                                        <strong>User Provided Transaction Details</strong>
                                                        <br>
                                                        <p class="text-muted">@if(@$details->getUserDetails->trans_type=="PPY")
                                                            <b>{{@$details->getUserDetails->trans_number}}</b>
                                                            @elseif(@$details->getUserDetails->trans_type=="GPY")
                                                           {{@$details->getUserDetails->trans_number}}

                                                            @elseif(@$details->getUserDetails->trans_type=="PTM")
                                                            {{@$details->getUserDetails->trans_number}}

                                                            @elseif(@$details->getUserDetails->trans_type=="BNK")
                                                           Bank name: {{@$details->getUserDetails->bank_name}}
                                                           <br>
                                                            <br>
                                                           Account No: {{@$details->getUserDetails->acc_no}}
                                                           <br>
                                                            <br>
                                                           Ifsc Code: {{@$details->getUserDetails->ifsc_code}}
                                                           <br>
                                                            <br>
                                                           Account Holder name: {{@$details->getUserDetails->bank_user_name}}


                                                            @elseif(@$details->getUserDetails->trans_type=="UPI")

                                                           {{@$details->getUserDetails->upi}}

                                                            @else
                                                            N/A

                                                            @endif
                                                        </p>
                                                    </div>

                                                     <br>
                                                  

                                                    <div class="about-info-p m-b-0">
                                                        <strong>Fee</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->getCourseDetails->due_amount}}</p>
                                                    </div>

                                                     <div class="about-info-p m-b-0">
                                                        <strong>Faciliation Fees</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->getPaperDetails->amount}}</p>
                                                    </div>


                                                      <div class="about-info-p m-b-0">
                                                        <strong>GST (rs/-)</strong>
                                                        <br>
                                                        <p class="text-muted">{{round(@$details->gst,2)}}</p>
                                                    </div>

                                                      <div class="about-info-p m-b-0">
                                                        <strong>Amount (rs/-)</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->amount}}</p>
                                                    </div>
                                                    <div class="about-info-p m-b-0">
                                                        <strong>Transaction id</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->transaction_id}}</p>
                                                    </div>

                                                      <div class="about-info-p m-b-0">
                                                        <strong>Transaction Status</strong>
                                                        <br>
                                                        @if(@$details->status_id=="1")
                                                        <p class="text-muted">Success</p>
                                                        @elseif(@$details->status_id=="2")
                                                          <p class="text-muted">Failed</p>
                                                        @else
                                                          <p class="text-muted">In progress</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->
                                            <!-- Languages -->
                                          
                                            <!-- Languages -->
                                        </div>

                                         <div class="col-md-6">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Course Information</h3>
                                                </div>
                                                <div class="panel-body">
												<div class="about-info-p">
                                                        <strong>Course</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->getCourseDetails->name}}</p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Subject</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->getSubjectDetails->name}}</p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Paper</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->getUserDetails->getPaperDetails->name}}</p>
                                                    </div>

                                                    <div class="about-info-p">
                                                        <strong>Time</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$details->created_at}}</p>
                                                    </div>
                            
                                                 
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->
                                            <!-- Languages -->
                                           {{--  <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Languages</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>English</li>
                                                        <li>Franch</li>
                                                        <li>Greek</li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                            <!-- Languages -->
                                        </div>
                                       

                                        <div class="col-md-6">
                                            <!-- Personal-Information -->
                                            <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Promo code Information</h3>
                                                </div>
                                                <div class="panel-body">
                                               
                                                    @php
                                                    $promo=App\Models\PromoCode::where('user_id',@$details->getUserDetails->promo_code_user_id)->first();
                                                    @endphp
                                                    @if($promo)
                                                     <div class="about-info-p">
                                                        <strong>Promo code used</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$promo->promo_code}}</p>
                                                    </div>
                                                    <div class="about-info-p">
                                                        <strong>Promo code user name</strong>
                                                        <br>
                                                        <p class="text-muted">{{@$promo->getUserDetails->name}}</p>
                                                    </div>
                                                    @else

                                                    <p>User did not used any invite code.</p>

                                                    @endif
                                                    
                            
                                                 
                                                </div>
                                            </div>
                                            <!-- Personal-Information -->
                                            <!-- Languages -->
                                           {{--  <div class="panel panel-default panel-fill">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Languages</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <ul>
                                                        <li>English</li>
                                                        <li>Franch</li>
                                                        <li>Greek</li>
                                                    </ul>
                                                </div>
                                            </div> --}}
                                            <!-- Languages -->
                                        </div>
                                       
                                    </div>
                                    
                                  
                              
                                    
                                </div>
                            </div>
                        </div>
                        </div> <!-- container -->
                        
                        </div> <!-- content -->
                       
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Right content here -->
<!-- ============================================================== -->
<!-- End Right content here -->
@section('footer')
@include('admin.include.footer')
@endsection
@endsection
{{-- end content --}}
@section('script')
@include('admin.include.script')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>





@endsection