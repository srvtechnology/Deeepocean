<!DOCTYPE html>
<html lang="en">
  <head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

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
    <!-- -------------fabicon-------------   -->
    <link rel="icon" type="image/x-icon" href="{{url('/')}}/assets/img/logo-d.ico">

   <title>Deep Ocean</title>

   <link rel="stylesheet" href="{{url('/')}}/assets/css/main.css" />
   <link rel="stylesheet" href="{{url('/')}}/assets/css/index.css" />
  </head>
  <body class="home-page">
   
@php
$banner=DB::table('banner')->first();
@endphp
{{-- <img src="{{url('/')}}/storage/app/public/banner_image/{{$banner->image}}" alt=""> --}}
  

  <style>
    .banner-main {
  background-repeat: no-repeat;
  background: linear-gradient(45deg, #2196f380, #2196f382),
  url( @if($banner) {{url('/')}}/storage/app/public/banner_image/{{$banner->image}} @else {{url('/')}}/assets/img/home/banner/banner-bg-c.png  @endif);
background-size: cover;
  background-position: center;
  margin-left: 50px;
    margin-right: 50px;
    margin-top: 100px;
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  margin: 0;
}
input[type=number] {
  -moz-appearance: textfield;
}
@media only screen and (max-width:500px) {
  .banner-form {
    display: none;
  }
}
/*24/1/22*/
/* @media only screen and (min-width: 1600px) and (max-width: 2560px) {
  .container{
    max-width: 1850px
  }
  .banner-main{
    padding: 128px 0 50px 0 !important;
  }
  .out-insp .card{
    height: 30vh !important;
  }
  .out-insp .card .card-body{
    width: 100%;
  }
  .out-team .content-img{
    bottom: -16px !important;
    left: 80px !important;
  }
  .out-insp{
    padding-bottom: 100px;
  }
  .out-team .content-img h3{
    padding-top: 40px;
    padding-left: 60px;
  }
  .out-team .content-img p{
    padding-left: 60px;
  }
  .about-us, .our-mission, .adv-board, .out-prod, .out-team{
    padding: 100px 0;
  }
} */

 #more1, #more2, #more3 {
        display: none;
      }
      .mb-5, .my-5 {
     margin-bottom: 0px !important; 
         margin: 15px 0 !important;
}
.kk{
  margin-left: 105px !important;
  margin-top: 10px !important;
}
.col-md-6.col-12.tnc p a {
    color: #7a7a7a;
}
.theme-title.tt-dark {
  display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
.kk22{
  margin-top: 15px !important;
}
  </style>
  
  @section('content')
  {{-- header --}}

  @include('frontend.includes.header')

  {{-- msg --}}
  
  <!-- banner -->
  <div class="banner-main">
    <div class="banner-bg max-theme-width container">
      <div class="row">
        <div class="col-md-8 col-12">
          <h4 style="margin-bottom: 20px">{{@$banner->text_1}}</h4>
          <h5 style="margin-bottom: 20px">{{@$banner->text_2}}</h5>
          <h6 style="margin-bottom: 20px">{{@$banner->text_3}}</h6>
          <p>{{@$banner->text_4}}</p>
         {{--  {!!@$banner->description!!} --}}
        </div>
        <div class="col-md-4 col-12 banner-form">
          <div class="form-card" style="    z-index: -5;
    position: relative;
    top: -999999999999px;
    left: -999999999999px;">
            <form method="post" action="{{route('reg.one')}}" id="frm">
              @csrf
              <div class="form-inner-card">
                <input type="text" name="name" class="form-control" placeholder="NAME" required />
                <input type="text" name="email" class="form-control" placeholder="EMAIL" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" />
                <input type="number" name="ph" class="form-control" placeholder="PHONE NUMBER" minlength="10" 
                />
                <select class="form-control" name="course" required>
                  <option value="">SELECT A COURSE</option>
                  @php
                  $courses=DB::table('course')->where('status','A')->get();

                  @endphp
                  @foreach($courses as $val)
                  <option value="{{@$val->id}}">{{@$val->name}}</option>
                  
                  @endforeach
                </select>
                <div class="captch">
                  {{-- <img
                  src="{{url('/')}}/assets/img/home/newsletter/recaptcha.png"
                  alt=""
                  /> --}}
                     <div class="capca_box ">
                                    <div class="g-recaptcha" data-sitekey="6LdQvfsdAAAAAOkSK0mwHTPL10qOmHiV9Lhs8DW4" data-callback="moCaptcha">
                                    </div>
                                </div>
                                <span class="moCaptchaError" style="color:black;display: none; float: right;">Please complete the recaptcha</span>
                                {{-- </div> --}}
                            </div>
                </div>
                <div class="btn-div">
                  <button class="btn btn-banner-submit" type="submit">SUBMIT NOW</button>
                  
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
 {{--  @include('admin.include.message') --}}








     <!-- about us -->
    <div class="about-us section-st" id="about">
      <div class="container">
        <div class="about-us-content">
          <div class="row">
            <div class="col-md-6 col-12 my-3 abtus justify-pp">
              {{-- <h3 class="heading">ABOUT US</h3>
                <p class="para1">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                  Possimus temporibus ducimus blanditiis aspernatur quisquam
                  consectetur in voluptatum placeat iusto! Enim debitis illum
                  magni iure repellendus facere, in non cum perferendis
                  temporibus.
                </p>
                <p class="para">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                  Eaque nihil, dolor officia earum ex dicta similique temporibus
                  optio! Ullam, delectus Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum facilis, fuga molestias soluta temporibus ipsa et deserunt, rem accusantium veniam unde, saepe atque veritatis? Animi dolorum temporibus earum. Sed, qui dolorem maxime repellendus obcaecati, ab vel itaque dignissimos delectus iusto in, error vitae rerum suscipit aliquid rem veritatis. Blanditiis aliquam exercitationem quia possimus nesciunt nemo ipsum, doloremque iusto? Blanditiis aliquam exercitationem quia possimus nesciunt nemo ipsum, doloremque iusto? <span id="dots1">...</span><br>
                  <span id="more1"> 
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Velit eius nam, consequuntur saepe reprehenderit tempore
                    eveniet qui? Minima eligendi perspiciatis, nisi possimus,
                    odio sit neque atque commodi esse, ut aliquam. saepe atque veritatis? Animi dolorum temporibus earum. Sed, qui dolorem maxime repellendus obcaecati, ab vel itaque dignissimos delectus iusto in, error vitae rerum suscipit aliquid rem veritatis. Blanditiis aliquam exercitationem quia possimus nesciunt nemo ipsum, doloremque iusto?
                  </span>
                </p> --}}
                {!!@$aboutus->text_1!!}
             {{--  <button
                class="btn btn-accent-blue"
                onclick="myFunction(1)"
                id="myBtn1"
              >
                SHOW MORE
              </button> --}}
            </div>
            <div class="col-md-6 col-12 about-us-img my-3">
              <img src="{{url('/')}}/storage/app/public/about_us/{{@$aboutus->image}}" width="330" height="350" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div>









    <!-- our inspiration -->
    <div class="out-insp section-st">
      <div class="container">
        <div class="theme-title tt-dark">OUR INSPIRATIONS</div>
        <div id="slick-slider-1" class="slick-init">
          @foreach($insp as $val)
          <div class="">
            <div class="card">
              <div class="card-header"><img src="{{url('/')}}/storage/app/public/inspiration/{{$val->image}}" class="card-img-top" alt="..."/></div>
              <div class="card-body">
                <h4 class="fnm">{{@$val->name}}</h4>
                <p class="card-text">{{@$val->text}}</p>
              </div>
            </div>
          </div>
          @endforeach
         
        </div>
      </div>
    </div>










{{-- mission and vission --}}
<div class="our-mission section-st">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12 omlc">
        <div class="row better_tex justify-pp" id="one">  {{-- 
          <div class="col-md-2 col-2">
            <img width="70" src="http://deeepocean.co.in/assets/img/home/dart.png" alt="" />
          </div>
          <div class="col-md-10 col-10 ourmv">
            <h3 class="heading">OUR MISSION</h3>
            <div>
              <p class="para1">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim
                libero saepe minima quod aperiam veniam itaque officia
                perspiciatis quis veritatis.
              </p>
              <p class="para">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                ipsum dolor sit amet consectetur.
              </p>
              <p class="para">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                ipsum dolor sit amet.
              </p>
              <p class="para mb-5">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem,
                ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                facilis.
              </p>
              <p class="para mb-5">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem,
                ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                facilis.
              </p>
              <p class="para mb-5">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem,
                ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                facilis.
              </p>
              <span id="dots2"></span>
              <span id="more2">
                <p class="para" >
                  <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                  ipsum dolor sit amet consectetur.
                </p>
                <p class="para">
                  <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                  ipsum dolor sit amet.
                </p>
                <p class="para mb-5">
                  <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem,
                  ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                  facilis.
                </p>
              </span>
            </div>
            <button class="btn btn-accent-blue" onclick="myFunction(2)"
            id="myBtn2">SHOW MORE</button>
          </div> --}}
           {!!@$mission->text_1!!}
        </div>
      </div>
      <div class="col-md-6 col-12">
        <div class="row better_tex2 justify-pp">{{-- 
          <div class="col-md-2 col-2">
            <img width="70" src="http://deeepocean.co.in/assets/img/home/bino.png" alt="" />
          </div>
          <div class="col-md-10 col-10 ourmv">
            <h3 class="heading">OUR VISION</h3>
            <div>
              <p class="para1">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim
                libero saepe minima quod aperiam veniam itaque officia
                perspiciatis quis veritatis.
              </p>
              <p class="para">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                ipsum lor sit amet consectetur.
              </p>
              <p class="para">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                ipsum dolor sit amet.
              </p>
              <p class="para mb-5">
                <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem,
                ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                facilis.
              </p>
              <span id="dots3"></span>
              <span id="more3">
                <p class="para" style="margin-top: -30px">
                  <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                  ipsum dolor sit amet consectetur.
                </p>
                <p class="para">
                  <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem
                  ipsum dolor sit amet.
                </p>
                <p class="para mb-5">
                  <img src="http://deeepocean.co.in/assets/img/home/list-check.png" alt="" /> Lorem,
                  ipsum dolor sit amet consectetur adipisicing elit. Saepe,
                  facilis.
                </p>
              </span>
            </div>
            <button class="btn btn-accent-blue" onclick="myFunction(3)"
            id="myBtn3">SHOW MORE</button>
          </div> --}}
           {!!@$mission->text_2!!}
        </div>
      </div>
    </div>
  </div>
</div>















    <!-- adivsory board -->
    <div class="adv-board section-st">
      <div class="container">
        <div class="theme-title tt-white">ADVISORY BOARD</div>
        <div id="slick-slider-2" class="slick-init">

          @foreach($advp as $val)
          <div>
            <div class="card">
              <img  src="{{url('/')}}/storage/app/public/advisory/{{@$val->image}}" width="270" height="auto" class="card-img-top"alt="..." />
              <div class="card-body">
                <h4 class="fnm">{{@$val->name}}</h4>
                <p class="card-text justify-pp">
                  {{@$val->text}}
                </p>
              </div>
            </div>
          </div>
          @endforeach
         
         
        </div>
      </div>
    </div>







   <!-- our products -->
    <div class="out-prod section-st"  id="product">
      <div class="container">
        <div class="theme-title tt-dark">
          OUR PRODUCTS
          <p class="para w-75 mx-auto justify-pp mb-5">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia
            animi facere voluptates nostrum ex esse numquam unde fugit odit,
            dolorum eaque saepe. Accusantium totam, distinctio nam deleniti
            delectus eos vitae.
          </p>
        </div>
        <div class="row">
          @foreach($product as $val)
          <div class="col-md-6 col-12 upls">
            <div class="card">
              <img
                src="{{url('/')}}/storage/app/public/product/{{@$val->image}}"
                class="card-img-top"
                alt="..."
                width="330"
                height="auto"
              />
              <div class="card-body">
                <h4>{{@$val->name}}</h4>
                <div class="para justify-pp product_txt{{@$val->id}}" id="product_txt{{@$val->id}}">
                 {{--  {{$val->text}} --}}
                  {!!@$val->text!!}
                </div>
                <br>
                <a href="{{@$val->link}}" target="_blank" style="text-align: center;">{{@$val->link}}</a>
              </div>
            </div>
          </div>
          @endforeach
       
        </div>
      </div>
    </div>







    <!-- out team -->
    <div class="out-team section-st" id="team">
      <div class="container">
        <div class="theme-title tt-dark">
          OUR TEAM
          <p class="para w-75 mx-auto mb-5">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia
            animi facere voluptates nostrum ex esse numquam unde fugit odit,
            dolorum eaque saepe. Accusantium totam, distinctio nam deleniti
            delectus eos vitae.
          </p>
        </div>
        <div class="row">
          @php
          $team=DB::table('team')->get();

          @endphp
          @foreach($team as $val)
          <div class="col-md-4 col-12 out-team-mem">
            <div class="content">
              <img src="{{url('/')}}/storage/app/public/team/{{@$val->image}}" />
              <div class="content-img">
                <img src="{{url('/')}}/assets/img/home/team/team-art.png" alt="">
                <h3>{{@$val->name}}</h3>
                <p>{{@$val->role}}</p>
              </div>
            </div>
          </div>
          @endforeach
       {{--    <div class="col-md-4 col-12 out-team-mem">
            <div class="content">
              <img src="{{url('/')}}/assets/img/home/team/Group15.png" />
              <div class="content-img">
                <img src="{{url('/')}}/assets/img/home/team/team-art.png" alt="">
                <h3>MARY'S GOODYEAR</h3>
                <p>Co-Founder</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-12 out-team-mem">
            <div class="content">
              <img src="{{url('/')}}/assets/img/home/team/Group14.png" />
              <div class="content-img">
                <img src="{{url('/')}}/assets/img/home/team/team-art.png" alt="">
                <h3>THOMAS JACKSON</h3>
                <p>Director</p>
              </div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>








     <!-- contact us -->
    <div class="contact-us section-st" id="contact">
      <div class="img-over">
        <img src="{{url('/')}}/assets/img/home/contact/1.png" alt="" />
        <img src="{{url('/')}}/assets/img/home/contact/2.png" alt="" />
      </div>
      <div class="max-theme-width">
        <div class="theme-title tt-dark">CONTACT US</div>
        <p class="para">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi
          harum aliquid id, nam excepturi eum.
        </p>
        <div class="form-card">


          <form method="post" action="{{route('contact.us')}}" id="frm2">
            @csrf
          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group">
                <input
                 name="name"
                 required
                 maxlength="50"
                  type="text"
                  class="form-control"
                  placeholder="Contact Name"
                />
              </div>
            </div>
            <div class="col-md-6 col-12">
              {{-- <div class="form-group">
                <input
                 name="res"
                 required
                  maxlength="50"
                  type="text"
                  class="form-control"
                  placeholder="Name of Course"
                />
              </div> --}}
               @php
                $courses=DB::table('course')->where('status','A')->orderBy('id','desc')->get();
                @endphp
              <select class="form-select form-control form-select-lg mb-3" aria-label=".form-select-lg example" name="res">
                <option selected class="contact-op1" >Select Course</option>
                @foreach($courses as $val)
                <option value="{{@$val->id}}" class="contact-op1">{{@$val->name}}</option>
                 @endforeach
              </select>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
               {{--  <input
                 name="ph"
                 minlength="10" 
                  type="number"
                  class="form-control"
                  placeholder="Phone Number"
                  
                /> --}}

                <input type="tel" name="ph" class="form-control" step="any" placeholder="PHONE NUMBER" minlength="10"   pattern="^\d{10}$" title="Please enter 10 digit number" required />
              </div>
            </div>
            <div class="col-md-6 col-12">
              <div class="form-group">
               {{--  <input type="text"  name="email" required class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Email" /> --}}
               <input type="text" name="email" class="form-control" placeholder="EMAIL"  maxlength="150" required pattern="^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$"  />
              </div>
            </div>
            <div class="col-md-12 col-12">
              <div class="form-group">
                <textarea
                name="text"
                required
                  rows="10"
                  class="form-control"
                  placeholder="Type your message here"
                ></textarea>
              </div>
            </div>
            <div class="col-md-12 col-12">
                <div class="captch">
                  {{-- <img
                  src="{{url('/')}}/assets/img/home/newsletter/recaptcha.png"
                  alt=""
                  /> --}}
                     <div class="capca_box ">
                                    <div class="g-recaptcha" data-sitekey="6LdQvfsdAAAAAOkSK0mwHTPL10qOmHiV9Lhs8DW4" data-callback="moCaptcha">
                                    </div>
                                </div>
                                <span class="moCaptchaError" style="color:red;display: none; float: left;">Please complete the recaptcha</span>
                                {{-- </div> --}}
                            </div>
                </div>
            </div>
            <div class="col-md-12 col-12" style="margin-top: 35px; padding-left: 0px;">
              <div class="btn-div">
                <button class="btn btn-accent-blue" type="submit" style="margin-top: auto;">SUBMIT</button>
                <button class="btn btn-accent-cancel" style="margin-top: auto;" onclick="cncl()">CANCEL</button>
              </div>
            </div>
          
        </form>

        </div>
         @include('admin.include.message')
        </div>

      </div>
    </div>



    <!-- sub-newsletter -->
{{--     <div class="sub-news section-st">
      <div class="container">
        <div class="stand-man">
          <img src="{{url('/')}}/assets/img/home/newsletter/man.png" alt="" />
        </div>
        <div class="row">
          <div class="col-md-4 col-12 stand-man-sm-hide"></div>
          <div class="col-md-6 col-12">
            <div class="theme-title tt-white">SUBSCRIBE TO OUR NEWSLETTER</div>
            <p class="para">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Exercitationem, at earum doloribus quia a amet.
            </p>
            <div class="email-sub">
              <input type="text" class="form-control" placeholder="Email" />
              <button class="btn btn-blue">SUBSCRIBE</button>
            </div>
            <div class="captcha">
              <img src="{{url('/')}}/assets/img/home/newsletter/recaptcha.png" alt="" />
            </div>
          </div>
        </div>
      </div>
    </div> --}}

    <!-- footer -->
    @php
$footer=DB::table('footer_content')->first();
@endphp

    <footer class="footer">
      <div class="container">
        <div class="row top-links">
          <div class="col-md-4 col-12">
            <a href="#" style="text-decoration: none">
            <img
              class="footer-logo1"
              src="{{url('/')}}/assets/img/logo-d.png"
              alt=""
              width="50"
              height="50"
            />
            <img
              class="footer-logo2"
              src="{{url('/')}}/assets/img/logo-do.png"
              alt=""
              width="50"
              height="50"
            />
          </a>
            <p>
                  {{@$footer->text}}
            </p>
            <div class="contact-info">
              <div>
                 <img src="{{url('/')}}/storage/app/public/footer/address/{{@$footer->address_img}}" alt="" width="20" height="25" />
                <p>
                 {{@$footer->address}} <br />
                 {{@$footer->address_2}}
                </p>
              </div>
            </div>
            <div class="contact-info">
              <div>
                <img
                 src="{{url('/')}}/storage/app/public/footer/email/{{@$footer->email_image}}"
                  alt=""
                  width="20"
                  height="20"
                />
              </div>
              <p>{{$footer->email}}</p>
            </div>
          </div>
          <!-- <div class="col-md-2 col-4 footer-menu">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Team</a></li>
              <li><a href="#">Products</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div> -->
          <div class="col-md-4 col-8 footer-menu">
            <ul>
              <li><a href="#">Payment Policy</a></li>
              <li><a href="#">Refund Policy</a></li>
              <li><a href="#">Financial Data Record Policy</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-12 footer-icon-div">
            <div class="footer-social-icon">
              <a target="_blank" href="https://twitter.com">
                <i class="fab fa-twitter"></i>
              </a>
              <a target="_blank" href="https://facebook.com">
                <i class="fab fa-facebook"></i>
              </a>
              <a target="_blank" href="https://instagram.com">
                <i class="fab fa-instagram"></i>
              </a>
              <a target="_blank" href="https://youtube.com">
                <i class="fab fa-youtube"></i>
              </a>
            </div>
            <button class="btn btn-outline-primary btn-sm">SHARE NOW</button>
          </div>
        </div>
        <hr class="footer-line">
        <div class="row bottom-links">
          <div class="col-md-6 col-12">
            <p>COPYRIGHT Ⓒ 2022 DEEEPOCEAN- ALL RIGHTS RESERVED</p>
          </div>
            @include('frontend.pages.tc_pp')
       {{--    <div class="col-md-6 col-12 tnc">
            <p> <a href="https://google.com"  target="_blank">  T&C | PRIVACY POLICY </a></p>
          </div> --}}
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js'></script>


    <script src="{{url('/')}}/assets/js/index.js"></script>

      <script src="https://www.google.com/recaptcha/api.js?hl=en" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
<script type="text/javascript">
  var onloadCallback = function() {
    // alert("grecaptcha is ready!");
    // grecaptcha.render('g-recaptcha', {
    //       'sitekey' : '6LdQvfsdAAAAAOkSK0mwHTPL10qOmHiV9Lhs8DW4'
    //     });
  };
</script>

  <script>
      let moCapt = null,
      vmtCapt = null;
      function moCaptcha(response) {
      moCapt = response;
      $('.moCaptchaError').hide();
      }
      // function vmtCaptcha(response) {
      // vmtCapt = response;
      // $('.vmtCaptchaError').hide();
      // }
      $("#frm").submit(function() {
        //alert(moCapt);
      if (moCapt == null || moCapt == '') {
      $('.moCaptchaError').show();
      return false;
      } else {
      $('.moCaptchaError').hide();
      }
      });

         $("#frm2").submit(function() {
       // alert(moCapt);
      if (moCapt == null || moCapt == '') {
      $('.moCaptchaError').show();
      return false;
      } else {
      $('.moCaptchaError').hide();
      }
      });
      </script>
         <script>
       function  cncl(){
          // $("#frm2").reset();
          $('#frm2').trigger("reset");
        }
      </script>

       <script>
      function myFunction(n) {
        var dots = document.getElementById("dots"+ n);
        var moreText = document.getElementById("more"+ n);
        var btnText = document.getElementById("myBtn"+ n);

        if (dots.style.display === "none") {
          dots.style.display = "inline";
          btnText.innerHTML = "SHOW MORE";
          moreText.style.display = "none";
        } else {
          dots.style.display = "none";
          btnText.innerHTML = "SHOW LESS";
          moreText.style.display = "inline";
        }
      }
    </script>









{{-- mission --}}
<script>
$( document ).ready(function() {

    let text_total1 = $('.better_tex').text();
    let str1= text_total1.substring(320, 330); 
    var html1= $('.better_tex').html();
    var s1=html1.indexOf(str1);

   let text = $('.better_tex').html();

//document.getElementsByClassName('better_tex').innerHTML = "jjj";
$(".better_tex").html(text.substring(0, s1)+'</p><br> <button class="btn btn-accent-blue mt-3" id="j">SHOW MORE</button>');  //1

$('#j').click(function(){
// alert("j");
$(".better_tex").html(text.substring(0)+'<br> <button class="btn btn-accent-blue kk" onClick="ccc()">SHOW LESS</button>');  //2
});


});
function ccc(){
    let text_total1 = $('.better_tex').text();
    let str1= text_total1.substring(320, 330); 
    var html1= $('.better_tex').html();
    var s1=html1.indexOf(str1);

    let text = $('.better_tex').html();

//text = text.split('<br> <button class="btn btn-accent-blue" onClick="ccc()">SHOW LESS</button>');
text = text.split('<br> <button class="btn btn-accent-blue kk" onclick="ccc()">SHOW LESS</button>');
text = text[0] ;
//alert(text[1]);
$(".better_tex").html(text.substring(0, s1)+'</p><br> <button class="btn btn-accent-blue mt-3" id="j">SHOW MORE</button>'); //3

$('#j').click(function(){
// alert(text);
$(".better_tex").html(text.substring(0)+'<br> <button class="btn btn-accent-blue kk" onClick="ccc()">SHOW LESS</button>'); //4
//alert($(".better_tex").text());

});
}
</script>













{{-- vision --}}
<script>
$( document ).ready(function() {

    let text_total2 = $('.better_tex2').text();
    let str2= text_total2.substring(380, 390); 
    var html2= $('.better_tex2').html();
    var s2=html2.indexOf(str2);

let text = $('.better_tex2').html();
//alert(text);
//document.getElementsByClassName('better_tex2').innerHTML = "jjj";
$(".better_tex2").html(text.substring(0, s2)+'</p><br> <button class="btn btn-accent-blue mt-3" id="j2">SHOW MORE</button>');  //1

$('#j2').click(function(){
// alert("j");
$(".better_tex2").html(text.substring(0)+'<br> <button class="btn btn-accent-blue kk" onClick="ccc2()">SHOW LESS</button>');  //2
});


});
function ccc2(){
    let text_total2 = $('.better_tex2').text();
    let str2= text_total2.substring(380, 390); 
    var html2= $('.better_tex2').html();
    var s2=html2.indexOf(str2);
    
    let text = $('.better_tex2').html();


//text = text.split('<br> <button class="btn btn-accent-blue" onClick="ccc2()">SHOW LESS</button>');
text = text.split('<br> <button class="btn btn-accent-blue kk" onclick="ccc2()">SHOW LESS</button>');
text = text[0] ;
//alert(text[1]);
$(".better_tex2").html(text.substring(0, s2)+'</p><br> <button class="btn btn-accent-blue mt-3" id="j2">SHOW MORE</button>'); //3

$('#j2').click(function(){
// alert(text);
$(".better_tex2").html(text.substring(0)+'<br> <button class="btn btn-accent-blue kk" onClick="ccc2()">SHOW LESS</button>'); //4
//alert($(".better_tex2").text());

});
}

</script>











<script>
  {{-- abtus --}}
  $( document ).ready(function() {

    let text_total3 = $('.abtus').text();
    let str3= text_total3.substring(610, 620); 
    var html3= $('.abtus').html();
    var s3=html3.indexOf(str3);

    let text = $('.abtus').html();
   //alert(text);


$(".abtus").html(text.substring(0, s3)+'</p><br> <button class="btn btn-accent-blue mt-3" id="j3">SHOW MORE</button>');  //1

$('#j3').click(function(){
// alert("j3");
$(".abtus").html(text.substring(0)+'<br> <button class="btn btn-accent-blue kk2" onClick="ccc3()">SHOW LESS</button>');  //2
});


});
function ccc3(){
    let text_total3 = $('.abtus').text();
    let str3= text_total3.substring(610, 620); 
    var html3= $('.abtus').html();
    var s3=html3.indexOf(str3);
    
    let text = $('.abtus').html();


text = text.split('<br> <button class="btn btn-accent-blue kk2" onclick="ccc3()">SHOW LESS</button>');
text = text[0] ;
//alert(text[1]);
$(".abtus").html(text.substring(0, s3)+'</p><br> <button class="btn btn-accent-blue mt-3" id="j3">SHOW MORE</button>'); //3

$('#j3').click(function(){
// alert(text);
$(".abtus").html(text.substring(0)+'<br> <button class="btn btn-accent-blue kk2" onClick="ccc3()">SHOW LESS</button>'); //4
//alert($(".abtus").text());

});
}
  </script>




{{--   <script>
     $( document ).ready(function() {
    //  let text_total3 = $('.abtus').text();
    // let str3= text_total3.substring(270, 280); 
    
    // var html3= $('.abtus').html();
    // var s3=html3.indexOf(str3);
    // console.log(str3,s3);

});
  </script> --}}





  {{-- product --}}

<script>
  
  $( document ).ready(function() {
      @foreach($product as $val)

    let text_total4{{$val->id}} = $('.product_txt{{$val->id}}').text();
    console.log(text_total4{{$val->id}});
    let str4{{$val->id}}= text_total4{{$val->id}}.substring(250, 260); 
    var html4{{$val->id}}= $('.product_txt{{$val->id}}').html();
    var s4{{$val->id}}=html4{{$val->id}}.indexOf(str4{{$val->id}});

    let text{{$val->id}} = $('.product_txt{{$val->id}}').html();
   //alert(text_total4);
   console.log(s4{{$val->id}});


$(".product_txt{{$val->id}}").html(text{{$val->id}}.substring(0, s4{{$val->id}})+'</p><br> <button class="btn btn-accent-blue mt-3" id="j4{{$val->id}}">SHOW MORE</button>');  //1

$('#j4{{$val->id}}').click(function(){
// alert("j4");
$(".product_txt{{$val->id}}").html(text{{$val->id}}.substring(0)+'<br> <button class="btn btn-accent-blue kk22" onClick="ccc4{{$val->id}}()">SHOW LESS</button>');  //2
});
@endforeach

});
   @foreach($product as $val)
function ccc4{{$val->id}}(){
    let text_total4{{$val->id}} = $('.product_txt{{$val->id}}').text();
    let str4{{$val->id}}= text_total4{{$val->id}}.substring(250, 260); 
    var html4{{$val->id}}= $('.product_txt{{$val->id}}').html();
    var s4{{$val->id}}=html4{{$val->id}}.indexOf(str4{{$val->id}});
    
    let text{{$val->id}} = $('.product_txt{{$val->id}}').html();


text{{$val->id}} = text{{$val->id}}.split('<br> <button class="btn btn-accent-blue kk22" onclick="ccc4{{$val->id}}()">SHOW LESS</button>');
text{{$val->id}} = text{{$val->id}}[0] ;
//alert(text[1]);
$(".product_txt{{$val->id}}").html(text{{$val->id}}.substring(0, s4{{$val->id}})+'</p><br> <button class="btn btn-accent-blue mt-3" id="j4{{$val->id}}">SHOW MORE</button>'); //3

$('#j4{{$val->id}}').click(function(){
// alert(text);
$(".product_txt{{$val->id}}").html(text{{$val->id}}.substring(0)+'<br> <button class="btn btn-accent-blue kk22" onClick="ccc4{{$val->id}}()">SHOW LESS</button>'); //4
//alert($(".product_txt").text());

});

}
@endforeach
  </script>

  </body>
</html>
