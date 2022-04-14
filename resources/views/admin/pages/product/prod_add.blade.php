@extends('admin.layouts.app')
@section('title')
<title>Admin | Add Product</title>
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
                    <h4 class="pull-left page-title"> Add Product </h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
                        <li class="active">Add Product </li>
                    </ol>
                </div>
            </div>
            @include('admin.include.message')
            <div class="add-btn "><a href="{{route('prod.list')}}"><i class="icofont-minus-circle"></i> Back</a></div>
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <!-- Personal-Information -->
                        <div class="panel panel-default panel-fill">
                            <div class="panel-heading">
                            <h3 class="panel-title">Add Product</h3> </div>
                            <div class="panel-body rm02 rm04">
                                <form role="form" id="frm" method="post" action="{{route('prod.insert')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group rm50">
                                        <label for="title">Name <span style="color: red;">*</span></label>
                                        <input type="text" placeholder="Name" value="{{old('name')}}"  class="form-control" name="name">
                                    </div>

                                      <div class="form-group rm50">
                                        <label for="title">Link {{-- <span style="color: red;">*</span> --}}</label>
                                        <input type="text" placeholder="Link" value="{{old('link')}}"  class="form-control" name="link">
                                    </div>
                                    
                                
                                    {{-- <div class="form-group rm50">
                                        <label for="meta description">Description <span style="color: red;">*</span></label>
                                  
                                        <textarea placeholder="Description"  class="form-control" name="desc" id="des" style="width: 500px;height: 100px">{{old('desc')}} </textarea>
                                    </div> --}}
                                <div class="clearfix"></div>
                                    <div class="form-group rm50">
                                        <label for="FullName">Description</label>
                                        
                                        <textarea id="mytextarea" placeholder="Description" name="desc" >{!!old('desc')!!}</textarea>
                                        <style>
                                        
                                        .tox.tox-tinymce {
                                            height: 500px !important;
                                            width: 400% !important;
                                        }
                                        
                                        </style>
                                    </div>
                                    <div class="clearfix"></div>



                                      <div class="clearfix"></div>
                                  
                                   
                                    
                         


                                 <div id="image" >
                                <div class="form-group">
                                        <label for="image">Image <span style="color: red;">*</span></label>

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
                                  
                                </div>


                                     {{--  <div class="form-group rm50">
                                        <label for="meta description"></label>
                                       <img src="" id="imgs" alt="img" style="width: 300px;">
                                      <label id="imgerror_id" class="error" style="display: none;">Please enter valid code </label>
                                    </div>
 --}}
                                    
                                                                   
                                    <div class="clearfix"></div>
                                    <div class="col-lg-12" style="margin-top: 10px">
                                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit" {{-- id="bbtt" disabled --}}>SUBMIT</button>
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

<script>

</script>

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
link:{
//required:true,
url:true,

},
img:{
required:true,
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
},
  

});
});
</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.0/tinymce.min.js" integrity="sha512-XaygRY58e7fVVWydN6jQsLpLMyf7qb4cKZjIi93WbKjT6+kG/x4H5Q73Tff69trL9K0YDPIswzWe6hkcyuOHlw==" crossorigin="anonymous"></script>
<script>
initTineMce();
function initTineMce(selector) {
if(selector == undefined){selector = 'textarea';}
tinymce.init({

content_css : "{{asset('public/frontend/css/style.css')}},{{asset('public/frontend/css/bootstrap.min.css')}}",

content_style: "@import url('https://fonts.googleapis.com/css2?family=Lato:wght@900&family=Roboto&display=swap'); body { font-family: 'Roboto'; }",
selector:selector,
menubar:false,
statusbar: false,
auto_focus : "elm1",
height: "350px",
plugins: "autoresize lists textcolor advlist table link media code image charmap fullpage spoiler advcode",
file_picker_types: 'file image media',
advlist_bullet_styles: 'disc',
image_caption: true,
inline_boundaries: false,
relative_urls : false,
remove_script_host : false,
convert_urls : true,
font_formats:"Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago;Roboto=roboto; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats",
toolbar: 'code | insertfile undo redo | styleselect | fontselect | fontsizeselect | forecolor backcolor | bold italic underline | superscript subscript | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | image | table tabledelete | tableprops tablerowprops tablecellprops | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol | customInsertButton customDateButton',
lists_indent_on_tab: false,
// plugins: 'table',
// menubar: 'table',
setup: function (editor) {
editor.ui.registry.addButton('customInsertButton', {
text: 'Add Button',
onAction: function (_) {
editor.insertContent('&nbsp; <a href="_BTNLINK_" class="save_all_changes_btn">Button</a>&nbsp;');
}
});
},

});


}
</script>
@endsection