@extends('admin.layouts.app')
@section('title')
<title>Admin | Banner management</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endsection
@section('content')
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="wraper container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<h4 class="pull-left page-title">Banner Management</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
						<li class="active">Banner Management</li>
					</ol>
				</div>
			</div>
			{{-- <div class="add-btn "><a href="{{route('schedule.list')}}"><i class="icofont-minus-circle"></i> Back</a></div> --}}
			<div class="row">
				<div class="col-lg-12">
					@include('admin.include.message')
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Current banner image</h3> </div>
							<div class="panel-body rm02 rm04">
								@if($banner)
								<img src="{{url('/')}}/storage/app/public/banner_image/{{$banner->image}}" alt="Banner" style="width: 900px; height: 400px;display: block;margin-left: auto;margin-right: auto;  ">
								@else
								<p>No image</p>
								@endif
								
								
								
								<div class="clearfix"></div>
								
								
							</div>
						</div>
						<!-- Personal-Information -->
					</div>
				</div>
			</div>
			{{-- for upload --}}
			<div class="row">
				<div class="col-lg-12">
					<div>
						<!-- Personal-Information -->
						<div class="panel panel-default panel-fill">
							<div class="panel-heading">
							<h3 class="panel-title">Edit banner</h3> </div>
							<div class="panel-body rm02 rm04">
								<form role="form" id="frm" method="post" action="{{route('upload.banner')}}" enctype="multipart/form-data">
									@csrf
									
									
								{{-- 	<div class="form-group rm50">
										<label for="FullName">Banner Description</label>
										
										<textarea id="mytextarea" name="desc" id="description">{!!@$banner->description!!}</textarea>
										<style>
										
										.tox.tox-tinymce {
										    height: 300px !important;
										    width: 300% !important;
										}
										
										</style>
									</div> --}}

							<div class="form-group rm50">
								<label for="FullName">Banner Text 1</label>
								 <input type="text" placeholder="Text 1"  class="form-control" name="text_1" value="{{@$banner->text_1}}"> 
							</div>
							<div class="clearfix"></div>
							<div class="form-group rm50">
								<label for="FullName">Banner Text 2</label>
								 <input type="text" placeholder="Text 2"  class="form-control" name="text_2" value="{{@$banner->text_2}}"> 
							</div>
							<div class="clearfix"></div>
							<div class="form-group rm50">
								<label for="FullName">Banner Text 3</label>
								 <input type="text" placeholder="Text 3"  class="form-control" name="text_3" value="{{@$banner->text_3}}"> 
							</div>
							<div class="clearfix"></div>
							<div class="form-group rm50">
								<label for="FullName">Banner Text 4</label>
								 <input type="text" placeholder="Text 4"  class="form-control" name="text_4" value="{{@$banner->text_4}}"> 
							</div>
									<div class="clearfix"></div>
									
									
									<div class="form-group">
										<label for="image">Image</label>
										<div class="fileUpload btn btn-primary cust_file clearfix">
											<span class="upld_txt"><i class="fa fa-upload upld-icon" aria-hidden="true"></i>Upload Image</span>
											<input type="file"  id="file-1" class="upload" name="img" accept="image/*" onChange="fun();">
										</div>
										<label for="image" style="margin-top: 10px;margin-bottom: 10px">Image dimension should be (700-2000 width) x (500-1000 height)</label>
									</div>
									<div class="clearfix"></div>
									<div class="review_img rmm_001" style="display: none">
										<em><img src="" alt=""id="img2" style="width: 700px; height: 350px;display: block;margin-left: auto;margin-right: auto;  "></em>
									</div>
		
									<div class="clearfix"></div>
									<div class="col-lg-12" style="margin-top: 10px;">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
$('#frm').validate({
rules:{

text_1:{
required:true,
minlength:3,
},
text_2:{
required:true,
minlength:3,
maxlength:50,
},
text_3:{
required:true,
minlength:3,
maxlength:50,
},
text_4:{
required:true,
minlength:3,
maxlength:50,
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
submitHandler: function(form){
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': "{{csrf_token()}}"
}
});
var fd= new FormData;
var im=document.getElementById("file-1").files[0];
fd.append("img",im);
//alert(im);
if(im==null){
	form.submit();
}
else{
	//alert("nio");
$.ajax({
url:"{{route('check.img')}}",
method:"POST",
data: fd,
contentType: false,
processData: false,
success: function(res) {
	console.log(res);
	if(res.w<700){
		alert("Image dimention range (width:700px-1500px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else if(res.w>2000){
		alert("Image dimention range (width:700px-1500px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else if(res.h<500){
		alert("Image dimention range (width:700px-1500px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else if(res.h>1000){
		alert("Image dimention range (width:700px-1500px & height:500-1000; Uploaded size "+res.w + " x " +res.h);
		return false;
	}
	else{
		//alert("k");
	form.submit();
	}
}
});
}

},
});
});
</script>
<script>
function fun(){
var i=document.getElementById('file-1').files[0];
//console.log(i);
var b=URL.createObjectURL(i);
$(".review_img").show();
$("#img2").attr("src",b);
}
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