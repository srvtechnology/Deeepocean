@extends('layouts.app')
@section('title')
@endsection
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Bootstrap CSS -->
	<link
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
		rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
		crossorigin="anonymous"
		/>
		<title>Payment</title>
		<link rel="stylesheet" href="{{url('/')}}/assets/css/main.css" />
		<link rel="stylesheet" href="{{url('/')}}/assets/css/thank-you.css" />
		<link rel="stylesheet" href="{{url('/')}}/assets/css/sign-up.css" />
		    <link rel="stylesheet" href="{{url('/')}}/assets/css/payment.css" />
	</head>
	
	@section('content')
	 <div class="main-header1">
      <img src="{{url('/')}}/assets/img/logo-d.png" alt="" />
    </div>
    <div class="main-header2">
      <img src="{{url('/')}}/assets/img/logo-do.png" alt="" />
    </div>
    <div class="dropdown-divider w-75 mx-auto mb-4"></div>

  <!-- -- card open -- -->
    <div class="t-card card">
      <div class="heding">
        <p>Add a new payment method</p>
      </div>
      <div class="card-details">
        <div class="row">
          <div class="col-md-6 col-6 cnd">
            <input type="radio" id="cnd"> Credit Card/Debit Card
          </div>
          <div class="col-md-6 col-6 cnd-img">
            <img src="{{url('/')}}/assets/img/pay-card.png" alt="">
          </div>
        </div>
      </div>
      <div class="full-card-details">
        <form>
          <div class="form-group">
            <label for="card-number">Card Number <span>*</span></label>
            <input type="number" class="form-control" placeholder="1234 5768 7410" id="card-num">
          </div>
          <div class="row">
            <div class="form-group col-md-8 col-8">
              <label for="card-number">Expiration (MM/YY) <span>*</span></label>
              <input type="number" class="form-control" placeholder="01/22">
            </div>
            <div class="form-group col-md-4 col-4">
              <label for="card-number">Security Code <span>*</span></label>
              <input type="number" class="form-control" placeholder="123">
            </div>
          </div>
        </form>
      </div>
      <div class="card-details">
        <div class="row">
          <div class="col-md-6 col-6 echeck">
            <input type="radio" id="echeck"> eCheck
          </div>
          <div class="col-md-6 col-6 echeck-img">
            <img src="{{url('/')}}/assets/img/card-em.png" alt="">
          </div>
        </div>
        <div class="dropdown-divider mx-auto mb-4"></div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            By signing up, you agree to our <a href="">Terms & Condition</a>
          </label>
        </div>
        <div class="pay-now-btn">
        <button class="btn-hover">PAY NOW</button>
      </div>
    </div>
</div>
	{{-- ALL THE PAGE CONTENT END --}}
	@section('footer')
	@include('frontend.includes.footer')
	
	@endsection
	{{-- end content --}}
	@section('script')
	@include('frontend.includes.script')
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
	sub_course:{
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
        
        
        }else{
          	$('#disable-input').prop("disabled",true);
        }

		 }
	</script>
	@endsection