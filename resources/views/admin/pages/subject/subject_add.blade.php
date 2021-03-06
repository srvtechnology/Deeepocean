@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Subject</title>
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
                    <h4 class="pull-left page-title"> Add Subject </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
                      
                        <li class="active">Add Subject </li>
                    </ol>
                </div>
            </div>
            @include('admin.include.message')
            <div class="add-btn "><a href="{{route('subject.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                            <h3 class="panel-title">Add Subject</h3> </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" id="frm" method="post" action="{{route('subject.insert')}}" enctype="multipart/form-data">
                                    @csrf

                          
                             <div class="form-group rm50">
                                        <label for="title">Subject name <span style="color: red;">*</span></label>
                                        <input type="text"  class="form-control" id="AboutMe" placeholder="Enter subject"  name="name" >
                             </div>

                              <div class="form-group">
                                        <label for="title">Select Course <span style="color: red;">*</span></label>
                                        <select name="course" class="form-control rm06" style="color: black" >
                                             <option value="" >Select</option>
                                             @foreach($course as $val)
                                              <option value="{{$val->id}}" >{{@$val->name}}</option>
                                              @endforeach
                                                                                         
                                        </select>
                                    </div>
                           
                            
                                
                                    <div class="clearfix"></div>
                                  
                                  
                                    
                                                                   
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12">
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">SUBMIT</button>
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
$('#frm').validate({
rules:{
name:{
required:true,
minlength:3,
maxlength:255,
},
course:{
required:true,
//minlength:5,
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