@extends('admin.layouts.app')
@section('title')
<title>Admin | Edit Advisory</title>
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
                    <h4 class="pull-left page-title"> Edit Advisory </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
                        <li class="active">Edit Advisory </li>
                    </ol>
                </div>
            </div>
            @include('admin.include.message')
            <div class="add-btn "><a href="{{route('adv.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                            <h3 class="panel-title">Edit advisory</h3> </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" id="frm" method="post" action="{{route('update.adv')}}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{@$adv->id}}">
                                    <div class="form-group rm50">
                                        <label for="title">Name <span style="color: red;">*</span></label>
                                        <input type="text" placeholder="Name"   class="form-control" name="name" value="{{$adv->name}}">
                                    </div>
                                    
                                
                                    <div class="form-group rm50">
                                        <label for="meta description">Description <span style="color: red;">*</span></label>
                                       {{--  <input type="text" placeholder="Description"  class="form-control" name="desc" value="{{$adv->text}}" id="des" style="width: 500px;"> --}}
                                        <textarea placeholder="Description"  class="form-control" name="desc" id="des" style="width: 500px;height: 100px">{{$adv->text}} </textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                  
                                 
                                   
                                      <div class="form-group">
                                        <label for="image">Image</label>

                                    <div class="fileUpload btn btn-primary cust_file clearfix">
                                            <span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Upload Image</span>
                                            <input type="file"   class="upload" name="img" {{-- onmouseout ="vdo_img()" onkeyup="vdo_img()"  --}}id="img" accept="image/*"  onChange="fun();" >
                                        </div>
                                        <label for="image" style="margin-top: 10px;margin-bottom: 10px">Image dimension should be (200-1250 width) x (100-700 height)</label>
                                        <label id="img-error" class="error" for="img"></label>
                                    </div>
                                     <div class="clearfix"></div>
                                      <div class="review_img rmm_001" style="display: none">
                                        <em><img src="" alt=""id="img2" style="width: 300px; height: 300px"></em>
                                    </div>
                                    <div class="clearfix"></div>
                                     <div class="form-group rm50 vdo-class">
                                         <label for="meta description">Previous Image</label>
                                       <img src="{{url('/')}}/storage/app/public/advisory/{{@$adv->image}}" style="width: 300px;">
                                    </div>
                                  




                                      <div class="clearfix"></div>
                                    <div class="col-lg-12" style="margin-top: 10px">
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit" {{-- id="bbtt" --}}>SAVE</button>
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
{{-- <script>
    function vdo_img(){
        var val=$('#code').val();
        //alert(val);
        var imgurl=$('#imgs').attr("src", "http://img.youtube.com/vi/"+val+"/maxresdefault.jpg");
        var imgsrc=$('#imgs').attr('src');

        $('#imgs').load(imgsrc, function(response, status, xhr) {
            console.log(status);
            if (status == "error"){ 
                 $('#imgs').css("display", "none");
                 $('#imgerror').html("Enter valid code");
                  $('#bbtt').prop("disabled", true);
                  //alert("no");
                  return false;
             }else{
                $('#imgs').css("display", "block");
                $('#bbtt').prop("disabled", false);
                $('#imgerror').html("");
                $('#imgs').attr("src", "http://img.youtube.com/vi/"+val+"/maxresdefault.jpg");
            }
            });
 
    }
</script> --}}
<script>
function fun(){
var i=document.getElementById('img').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".review_img").show();
$("#img2").attr("src",b);
}
</script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
$('#frm').validate({
rules:{
name:{
required:true,
minlength:3,
maxlength:30,
},

desc:{
required:true,
minlength:3,


},

// img:{
// required:true,
// },
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
},
submitHandler: function(form){
               
                
                
                var textareas = $('#des').val();
                var words = $.trim(textareas).length ? textareas.match(/\S+/g).length : 0;
                
                if(words >19 && words <31 ) {
                    // alert(words);
                   // return false;
                    form.submit();
                }
                
                else {
                    alert(" Words range should be within 20 to 30.");
                //$("#about_err").html('Please enter maximum 200 words');
                return false;
                }
               
                },
 
});
});
</script>
@endsection