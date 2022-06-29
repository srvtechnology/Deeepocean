@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit User</title>
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
                    <h4 class="pull-left page-title"> Edit  User </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
                      
                        <li class="active">Edit  User </li>
                    </ol>
                </div>
            </div>
            @include('admin.include.message')
            <div class="add-btn "><a href="{{route('paid.users')}}"><i class="icofont-minus-circle"></i> Back</a></div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                            <h3 class="panel-title">Edit User</h3> </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" id="frm" method="post" action="{{route('user.update')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{@$datas->id}}">

                          
                             <div class="form-group rm50">
                                        <label for="title">Name <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="name" value="{{@$datas->name}}" disabled>
                                    </div>

                                     <div class="form-group rm50">
                                        <label for="title">Email <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="email" value="{{@$datas->email}}">
                                    </div>

                                     <div class="form-group rm50">
                                        <label for="title">Mobile <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="mobile" value="{{@$datas->mobile}}">
                                    </div>
                           
                            
                                
                                    <div class="clearfix"></div>
                                     <div class="panel-heading" style="margin-top: 30px;margin-bottom: 25px">
                                  <h3 class="panel-title">Edit User Reward Transaction details</h3> </div>
                                    @if(@$datas->trans_type=="PPY" )
                                     <div class="form-group rm50">
                                        <label for="title">PhonePe <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="pp" value="{{@$datas->trans_number}}">
                                    </div>
                                    @endif

                                    @if(@$datas->trans_type=="GPY" )
                                     <div class="form-group rm50">
                                        <label for="title">Google Pay <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="gp" value="{{@$datas->trans_number}}">
                                    </div>
                                    @endif

                                     @if(@$datas->trans_type=="UPI" )
                                     <div class="form-group rm50">
                                        <label for="title">UPI ID <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="upi" value="{{@$datas->upi}}">
                                    </div>
                                    @endif

                                     @if(@$datas->trans_type=="PTM" )
                                     <div class="form-group rm50">
                                        <label for="title">Paytm <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="ptm" value="{{@$datas->trans_number}}">
                                    </div>
                                    @endif

                                    @if(@$datas->trans_type=="BNK" )
                                     <div class="form-group rm50">
                                        <label for="title">Bank Name <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="bank_name" value="{{@$datas->bank_name}}">
                                    </div>

                                    <div class="form-group rm50">
                                        <label for="title">Account No <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="acc_no" value="{{@$datas->acc_no}}">
                                    </div>

                                    <div class="form-group rm50">
                                        <label for="title">Ifsc Code <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="ifsc_code" value="{{@$datas->ifsc_code}}">
                                    </div>

                                    <div class="form-group rm50">
                                        <label for="title">Bank Holder Name <span style="color: red;">*</span></label>
                                       
                                        <input type="text" class="form-control" name="bank_user_name" value="{{@$datas->bank_user_name}}">
                                    </div>
                                    @endif

                                     @if(@$datas->trans_type=="" )
                                     <br>
                                    <p style="margin-left: 17px"> USER DID NOT PROVIDE ANY DATA FOR REWARD TRANSACTION </p>
                                    <br>

                                     @endif
                                  
                                  
                                    
                                                                   
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">SAVE</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Personal-Information -->
                    </div>
                </div>
            </div>
        </div>
        <!-- container -->
    </div>
    <!-- Service -->
    
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>







<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){

	jQuery.validator.addMethod("validate_email", function(value, element) {
if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
return true;
} else {
return false;
}
}, "Please enter a valid email address.");

jQuery.validator.addMethod("mobileonly", function(value, element) {
            return this.optional(element) ||  /^[+]?\d+$/.test(value.toLowerCase());
        }, "Enter valid number");


$('#frm').validate({
rules:{
email:{
required:true,
validate_email:true,
},

mobile:{
required:true,
minlength:10,
maxlength:10,
mobileonly:true,
},

},
messages:{
/*   old_password:{
required:" Old password is mandatory",
min:"Enter minimum 6 characters"
},
newPassword:{
required:" New password is mandatory",
min:"Enter minimum 6 characters"
},
confirm:{
required:" Confirm password is mandatory",
min:"Enter minimum 6 characters",
equalTo :"New password and confirm password are not matching"
},*/
}
});
});
</script>
@endsection