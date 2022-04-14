@extends('admin.layouts.app')
@section('title')
@endsection
<head>
	<!-- Required meta tags -->
{{-- 	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Bootstrap CSS -->
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
		crossorigin="anonymous"
		/>
		<title>Sign | Up</title>
		<link rel="stylesheet" href="{{url('/')}}/assets/css/main.css" />
		<link rel="stylesheet" href="{{url('/')}}/assets/css/thank-you.css" />
		<link rel="stylesheet" href="{{url('/')}}/assets/css/sign-up.css" />
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
		{{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
 --}}

		 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
      />
      <link rel="stylesheet" href="{{url('/')}}/assets/css/thank-you.css" />
      <link rel="stylesheet" href="{{url('/')}}/assets/css/sign-up.css" />
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css'>
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css'>
      <!-- Bootstrap CSS -->
      <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous"
        />
        <!-- -- Icon CDN --  -->
        <link
          rel="stylesheet"
          href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
          crossorigin="anonymous"
          />

         <title>Sign | Up</title>
          <link rel="stylesheet" href="{{url('/')}}/assets/css/main.css" />
          <link rel="stylesheet" href="{{url('/')}}/assets/css/index.css" />
          <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
          
           <!-- -------------fabicon-------------   -->
          <link rel="icon" type="image/x-icon" href="{{url('/')}}/assets/img/logo-d.ico">
          <style>
            ::placeholder{
              font-size: 16px;
            }
         @media only screen and (min-width: 1600px) and (max-width: 2560px) {
         .container{
			    max-width: 1850px
			  }
		}
		.modal-backdrop.fade {
opacity: 0;
filter: alpha(opacity=0);
}
.modal-backdrop.in {
opacity: 0.5;
filter: alpha(opacity=50);
}



.modal-backdrop.fade {
opacity: 0;
filter: alpha(opacity=0);
}
.modal-backdrop.fade.in {
opacity: 0.5;
filter: alpha(opacity=50);
}
          </style>

	</head>
	
	@section('content')
	{{-- <div class="main-header1">
		<a href="{{route('index.page')}}"><img src="{{url('/')}}/assets/img/logo-d.png" alt="" /></a>
	</div> --}}
	<div class="main-header2">
		<a href="{{route('index.page')}}"><img src="{{url('/')}}/assets/img/logo-new.png" alt="" /></a>
	</div>
  <div class="container">
	<div class="dropdown-divider mb-4"></div>
  </div>
	<!-- -- Start Sign-up-new --  -->
	<div class="sign-up container">
		<div class="row">
			<div class="col-md-8 col-12">
		 <div class="left-content-up">
           <div class="row">
            <div class="col-md-6 col-12 my-2 px-1">
							<label for="name">NAME:</label>
							<span>{{@$user->name}}</span>
						</div>
						<div class="col-md-6 col-12 my-2 px-1">
							<label for="email">Email:</label>
							<span>{{@$user->email}}</span>
						</div>
						<div class="col-md-6 col-12 my-2 px-1">
							<label for="phone">Phone Number:</label>
							<span>{{@$user->mobile}}</span>
						</div>
						<div class="col-md-6 col-12 my-2 px-1">
							<label for="course">Course:</label>
							<span>{{@$user->getCourseDetails->name}}</span>
						</div>

           </div>
          </div>
				<div class="left-content-down">
					<form method="post" action="{{route('reg.two.post')}}" id="frm">
						@csrf
						<input type="hidden" name="u_id" value="{{@$user->id}}">
						<input type="hidden" id="promo_code_user_id" name="promo_code_user_id" value="">

						<div class="input-bdr">
							<img src="{{url('/')}}/assets/img/calendar.png" />
							<input
							class="form-control"
							type="text"
							placeholder="Date Of Birth"
							name="dob"
							id="from_date"
							readonly
							/>
						</div>
						<div class="input-bdr">
							<img src="{{url('/')}}/assets/img/online-course.png" />
							<select name="subject" id="subject" onchange="getPaper()">
								<option value="">Subject</option>
								@foreach($subject as $val)
								<option value="{{@$val->id}}">{{@$val->name}}</option>
								@endforeach
								
							</select>
						</div>
						<div class="input-bdr" id="paper_fetchh">
							<img src="{{url('/')}}/assets/img/online-course.png" />
							<select name="paper" id="paper" onchange="getamount()">
								<option value="">Select paper</option>
								{{-- <option value="1">Paper 1</option>
								<option value="2">Paper 2</option>
								<option value="3">Paper 3</option> --}}
							</select>
						</div>
						{{-- cashfree start --}}
						@if(Session::has('successMessage'))
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert">×</a>
							<strong>Alert </strong> {!!Session::get('successMessage')!!}
						</div>
						@endif
						@if(Session::has('errorMessage'))
						<div class="alert alert-success">
							<a class="close" data-dismiss="alert">×</a>
							<strong>Alert </strong> {!!Session::get('errorMessage')!!}
						</div>
						@endif
						
						{{--  <label for="name">Customer Name</label> --}}
						<input type="hidden" class="form-control" name="customerName" placeholder="Customer Name"  value="{{@$user->name}}">
						@if ($errors->has('customerName'))
						<span style="color: red;">{{ $errors->first('customerName') }}</span>
						@endif

						{{--  <label for="name">Customer Name</label> --}}
						<input type="hidden" class="form-control" name="customerId" placeholder="Customer id"  value="{{@$user->id}}">
						@if ($errors->has('customerName'))
						<span style="color: red;">{{ $errors->first('customerName') }}</span>
						@endif
						
						
						{{-- <label for="name">Customer Phone</label> --}}
						<input type="hidden" class="form-control" name="customerPhone" placeholder="Customer Name"  value="{{@$user->mobile}}">
						@if ($errors->has('customerPhone'))
						<span style="color: red;">{{ $errors->first('customerPhone') }}</span>
						@endif
						
						
						{{-- <label for="name">Customer Email</label> --}}
						<input type="hidden" class="form-control" name="customerEmail" placeholder="Customer Name"  value="{{@$user->email}}">
						@if ($errors->has('customerEmail'))
						<span style="color: red;">{{ $errors->first('customerEmail') }}</span>
						@endif
						
						
						{{-- <label for="name">Amount</label> --}}
						<input type="hidden" class="form-control" name="amount" placeholder="Amount"   id="cashfeeamount">
						@if ($errors->has('amount'))
						<span style="color: red;">{{ $errors->first('amount') }}</span>
						@endif
						
						
						
				
						{{-- end --}}


						{{-- <div class="form-check my-3">
							<input class="form-check-input" type="checkbox" value="" onclick="clk()" id="flexCheckDefault">
							<label class="form-check-label" for="flexCheckDefault">
								By signing up, you agree to our <a href="#" data-toggle="modal" data-target="#myModal">Terms & Condition</a>
							</label>
						</div>
						<button class="btn-hover" type="submit"  id="disable-input" style="opacity:0.6;margin-bottom: 40px;" disabled>SUBMIT</button>

						<a href="{{route('index.page')}}" onclick="return confirm('Are you sure want to cancel?')" class="button btn-cancel">CANCEL</a> --}}

					</form>
					
				</div>
			</div>
			<div class="col-md-4 col-12">
				<div class="right-content">
					<div class="child-right-content">
					<h2><span id="subject_name"></span> | <span id="paper_name"></span> </h2>
					<div class="row" style="margin-top: 15px">
						
                      
                      {{--  <h6 style="font-size: 13px">	2,00,000 : Due Amount*</h6> --}}
                      <input type="hidden" id="reserve_rs" value="">



                     {{--  <div id="promo-div" style="margin-bottom: 10px;display: none;">
							<input type="number" minlength="10" name="prom_code" id="prom_code" placeholder="apply promo code" >
							<br><span id="promo_error" style="color:black;"></span>
							<br>
							<input type="button" value ="apply" onclick="promofun()">
						</div> --}}
						<style>
							#prom_code::placeholder{
                               font-size: 12px;
							}
							#prmo-btn{
								        border-radius: 20px;
									    background: #fff;
									    padding: 3px 8px;
									    color: #4186ea;
									    border: 1px solid white;
									    font-size: 14px;
									    font-weight: 500;
									    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;

							}
							#prmo-btn:hover{
								background-color: #095d8d;
							}
							#prom_code::-webkit-outer-spin-button,
							#prom_code::-webkit-inner-spin-button {
							  -webkit-appearance: none;
							  -moz-appearance: none;
							  appearance: none;
							  margin: 0;
							}
							#prom_code[type=text] {
							  -moz-appearance: textfield;
							  outline: none;
							  width: 100%;
							  border-radius: 7px;
							    border: 1px solid white;
							    padding: 0 5px;
							    box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
							}
							
						</style>

						 <div id="promo-div" style="margin-bottom: 20px;display: none;">
						 	<div style="display: flex; justify-content: space-between;  gap:5px;">
							<input type="text" minlength="10" maxlength="10" name="prom_code" id="prom_code" placeholder="Invitation code" >
							<input type="button" value ="Apply" id="prmo-btn" onclick="promofun()">
							
							<i class="fa fa-info-circle" onclick="promo_msg()" style="margin-top: 7px; color: white;"></i>
							<script>
								function promo_msg(){
									//alert("h");
									$("#promo_error").show();
									$("#promo_error").html('<p style="font-size:14px;">For a invite code ,Please reach out to your friend who is already a member of DeeepOcean family.</p>');
            	                    setTimeout(function() { $("#promo_error").hide(); },8000);
								}
							</script>
							</div>
							<span id="promo_error" style="color:white;"></span>
						</div>
                     

						
						<div class="col-md-6 col-6 rs">
							<p style="font-size: 21px" >₹{{@$user->getCourseDetails->due_amount}}</p>
						</div>
						<div class="col-md-6 col-6 rs-nm">
							<p style="margin-top: 4px">Fee*</p>
						</div>
						<h6 style="font-size: 12px;margin-bottom:20px">* Candidate has to pay this amount after his/her selection </h6>

						


					<hr class="w-75 mx-auto">
						<div class="col-md-6 col-6 rs">
							<p id="amnt">₹0</p>
						</div>
						<div class="col-md-6 col-6 rs-nm">
							<p>Facilitation Fee</p>
						</div>

						<div class="col-md-6 col-6 rs" id="discount1" style="display: none;" >
							<p id="dis1">-₹0</p>
						</div>
						<div class="col-md-6 col-6 rs-nm" id="discount2" style="display: none;" >
							<p>Discount</p>
						</div>


						<div class="col-md-6 col-6 rs">
							<p id="gst">₹0</p>
						</div>
						<div class="col-md-6 col-6 rs-nm">
							<p>18% GST</p>
						</div>
						{{--  --}}
						<hr class="w-75 mx-auto">
						<div class="col-md-6 col-6 trs">
							<p  id="total">₹0</p>
						</div>
						<div class="col-md-6 col-6 rs-nm">
							<p>Total</p>
						</div>
					</div>
					
				</div>				
			</div>

    {{-- buttons part of form --}}
			<div class="form-check my-3">
				<input class="form-check-input" type="checkbox" value="" onclick="clk()" id="flexCheckDefault">
				<label class="form-check-label" for="flexCheckDefault">
					By signing up, you agree to our <a href="#" data-toggle="modal" data-target="#myModal">Terms & Condition</a>
				</label>
			</div>
			<button class="btn-hover" type="submit"  id="disable-input" style="opacity:0.6;margin-bottom: 40px;" disabled onclick="form_submit()">SUBMIT</button>

			<a href="{{route('index.page')}}" onclick="return confirm('Are you sure want to cancel?')" class="button btn-cancel">CANCEL</a>


		</div>
		</div>
	</div>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Terms and Condition</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      @php
      $tc2=DB::table('term_condition')->where('id','2')->first();
      @endphp
      <div class="modal-body">
      <p style="font-size: 13px;
			    font-weight: 600;
			    color: #7a7a7a;
			    margin-bottom: 30px;"> {{@$tc2->text}}</p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
      </div>

    </div>
  </div>
</div>

	<!-- -- Closed Sign-up-new --  -->
	
	{{-- ALL THE PAGE CONTENT END --}}
	@section('footer')
	@include('frontend.includes.footer')
	
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
	}, "Enter a valid 10 digit mobile number");
	$('#frm').validate({
	rules:{
	dob:{
	required:true,
	//minlength:3,
	
	},
	subject:{
	required:true,
	//validate_email:true
	
	},
	paper:{
	required:true,
	//minlength:10,
	
	},
	},
	messages:{
	// link:{
	// required:" social link is mandatory",
	// min:"Enter valid links"
	// }
	}
	});
	});
	</script>
	<script>
    function clk(){
			if($('#flexCheckDefault').prop("checked") == true){
				//alert("j");
				$('#disable-input').prop("disabled",false);
				$('#disable-input').css("opacity",1);
	
	
				}else{
				$('#disable-input').prop("disabled",true);
				$('#disable-input').css("opacity",0.6);
				
				}
	}



	function form_submit(){
		$("#frm").submit();
	}
	</script>




	<script>
		function getPaper(){
			var subject=$("#subject").val();
			$("#paper").val('');
			$("#paper_name").html('');
			$("#subject_name").html('');
			$("#amnt").html('₹0');
			 $("#gst").html('₹0');
			
			 $("#total").html('₹0');
			 $("#cashfeeamount").val('');
	
	// alert(subject);
	//ajax
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': "{{csrf_token()}}"
	}
	});
	var fd= new FormData;
	fd.append('sub_id',subject);
	$.ajax({
	url:'{{route('fetch.paper')}}',
	type:'POST',
	data: fd,
	contentType: false,
	processData: false,
	
	success:function(res){
	// console.log(res);
	//alert("j");
	$("#paper_fetchh").html(res);

	}
	});
	}
	</script>

	<script type="text/javascript">
		function getamount(){
			var paper=$("#paper").val();
			//alert(paper);
			$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': "{{csrf_token()}}"
	}
	});
	var fd= new FormData;
	fd.append('paper_id',paper);
	$.ajax({
	url:'{{route('fetch.paper.details')}}',
	type:'POST',
	data: fd,
	contentType: false,
	processData: false,
	
	success:function(res){
	 //console.log(res.id.name,res.subject.name);
	 console.log(res);
	//alert("j");
	$("#promo-div").show();
	$("#paper_name").html(res.id.name);
	$("#subject_name").html(res.subject.name);
	$("#amnt").html('₹'+res.id.amount);
	 var amountt=res.id.amount;
	 var gst=parseFloat(res.id.amount)*18/100;
	 var gst_txt=(parseFloat(res.id.amount)*18/100).toFixed(2);
	 //alert(gst);
	 $("#gst").html('₹'+gst_txt);
	 var total=(parseFloat(amountt)+gst).toFixed(2);
	 $("#total").html('₹'+total);
	 //cashfree reserve_rs
	 $("#cashfeeamount").val(total);
	 $("#reserve_rs").val(parseFloat(amountt));
	
	}
	});

		}
	</script>


	<script>
$(document).ready(function(){

var min = new Date();
$("#from_date").datepicker({
yearRange: "1970:+nn",
dateFormat:"yy-mm-dd",
 changeYear: true,
       // minDate: '-70Y',
        maxDate: '-1D',
});
// $("#to_date").datepicker({

// dateFormat:"yy-mm-dd"
// });
});
</script>
<script>
	function promofun(){
     var p=$("#prom_code").val();
      var p_id=$("#paper").val();
     if(p.length<10){
     	$("#promo_error").html('Please enter 10 digit code');
     	 $("#promo_code_user_id").val('');
     	return false;
     }
    else if(p.length>10){
     	$("#promo_error").html('Please enter 10 digit code');
     	 $("#promo_code_user_id").val('');
     	return false;
     }
    // alert(p);
     //promo code is valid or not
     $.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': "{{csrf_token()}}"
	}
	});
	var fd= new FormData;
	fd.append('promo_code',p);
	fd.append('paper_id',p_id);
	$.ajax({
	url:'{{route('check.promo')}}',
	type:'POST',
	data: fd,
	contentType: false,
	processData: false,
	
	success:function(res){
	 //console.log(res);
	//alert(res.code);
	if(res.msg=="Wrong"){
		$("#discount1").hide();
		$("#discount2").hide();
		$("#promo_error").show();
		$("#promo_error").css('color',"white");
	    $("#promo_error").html('Entered code is wrong.');
	
	    var reserve_rs=$("#reserve_rs").val();
	    var showamt=parseFloat(reserve_rs).toFixed(2);
	    $("#amnt").html('₹'+showamt);
	    
	    var gst=parseFloat(reserve_rs)*18/100;
	    var gts_txt=(parseFloat(reserve_rs)*18/100).toFixed(2);
	    //alert(gst);
	    $("#gst").html('₹'+gts_txt);
	   
	    var total=(parseFloat(reserve_rs)+gst).toFixed(2);
	    $("#total").html('₹'+total);
	    //cashfree
	    $("#cashfeeamount").val(total);
 
       //promo_code_user_id value will be null
       $("#promo_code_user_id").val('');
     	return false;

	}else{
		//$("#promo_error").hide();
		$("#promo_error").show();
	    $("#promo_error").html('Code matched.');
	    $("#promo_error").css('color',"white");
		$("#discount1").show();
		$("#discount2").show();
		$("#dis1").html('₹'+res.promo_value);
        var newamount= parseFloat($("#reserve_rs").val())-parseFloat(res.promo_value);
		//$("#total").html('₹'+newamount);

		 var gst=parseFloat(newamount)*18/100;
		 //alert(gst);
		 $("#gst").html('₹'+gst);
		 var total=(parseFloat(newamount)+gst).toFixed(2);
		 $("#total").html('₹'+total);
		 //cashfree reserve_rs
		 $("#cashfeeamount").val(total);


		 //cashfree
		 // $("#cashfeeamount").val(newtotal);
		  $("#promo_code_user_id").val(res.user_id_of_promo_code);


	}
	

	}
	});

	}
	
</script>
	@endsection