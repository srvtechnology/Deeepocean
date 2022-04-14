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
      <!-- -------------fabicon-------------   -->
      <link rel="icon" type="image/x-icon" href="{{url('/')}}/assets/img/logo-d.ico">
      <!-- -- Icon CDN --  -->
      <link
        rel="stylesheet"
        href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
        crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="{{url('/')}}/assets/css/main.css" />
        <link rel="stylesheet" href="{{url('/')}}/assets/css/index.css" />
        <title>Faild | Transaction | Deep Ocean</title>
        <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2HXT9TQQNR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2HXT9TQQNR');
</script>
        {{--     <link rel="stylesheet" href="{{url('/')}}/assets/css/main.css" /> --}}
        <link rel="stylesheet" href="{{url('/')}}/assets/css/thank-you.css" />
        <style>
        .btn-hover {
        padding: 14px 45px;
        font-size: 14px;
        font-weight: 500;
        color: #fff;
        height: 50px;
        text-align: center;
        border: none;
        margin: 10px;
        background: #1285c6;
        background-size: 300% 100%;
        box-shadow: rgb(18 133 198 / 23%) 15px 20px 20px 0px;
        border-radius: 50px;
        }
        .btn-hover:hover {
        color: #fff;
        box-shadow: none;
        }
        </style>
      </head>
      <body class="thank-you">
        {{--  <div class="main-header1">
          <a href="{{route('index.page')}}"><img src="{{url('/')}}/assets/img/logo-d.png" alt="" /></a>
        </div> --}}
        <div class="main-header2">
          <a href="{{route('index.page')}}"><img src="{{url('/')}}/assets/img/logo-new.png" alt="" /></a>
        </div>
        <div class="dropdown-divider w-75 mx-auto mb-4"></div>
        <div class="t-card card">
          {{-- <img src="{{url('/')}}/assets/img/thumb-up.png" alt="" /> --}}
          <i class="fas fa-thumbs-down" style="font-size: 30px"></i>
          @php
          @$getDetailsUser=DB::table('payment')->where('id', $id)->first();
          @$UserDetails=DB::table('users')->where('id',$getDetailsUser->customer_id)->first();
          @$course=DB::table('course')->where('id',$UserDetails->course)->first();
          @endphp
          <h4>Sorry!</h4>
          <p >Name: {{@$UserDetails->name}}</p>
            
        <p>  Course Registered Name: {{@$course->name}} </p>
        <br>
          <p> Your Payment to DeeepOcean was unsuccessful!</p>
          <img src="{{url('/')}}/assets/img/fast-email.png" alt="" width="30" height="20" />
          <span>
            
            Unfortunately, we were not able to process your payment. Please make sure to update your billing information and try again.
          </span>
          <br />
          <span>
            For further inquiry please contact us. WhatsApp number - 9990378888,<br> mail id – support@deeepocean.co.in
          </span>
          <a href="{{route('index.page')}}"> <button class="btn btn-hover">Continue to Home</button></a>
          <div class="t-card-2-icon">
            {{--  <img src="{{url('/')}}/assets/img/laptop-fax.png" alt="" /> --}}
            <!-- <img src="{{url('/')}}/assets/img/logo.png" alt="" width="16" height="16" /> -->
          </div>
        </div>
        @php
        $footer=DB::table('footer_content')->first();
        @endphp
        <footer class="footer">
          <div class="container">
            <div class="row top-links">
              <div class="col-md-4 col-12">
                <a href="{{route('index.page')}}" style="text-decoration: none">
                  {{--   <img
                  class="footer-logo1"
                  src="{{url('/')}}/assets/img/logo-d.png"
                  alt=""
                  width="50"
                  height="50"
                  /> --}}
                  <img
                  class="footer-logo2"
                  src="{{url('/')}}/assets/img/logo-d-long.png"
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
             @include('frontend.pages.fotter_all_model')
              <div class="col-md-3 col-12 footer-icon-div">
                <div class="footer-social-icon">
                  <a target="_blank" href="https://twitter.com/deeep_ocean">
                    <i class="fab fa-twitter"></i>
                  </a>
                  <a target="_blank" href="https://www.facebook.com/Deeep-Ocean-101116969207296">
                    <i class="fab fa-facebook"></i>
                  </a>
                  <a target="_blank" href="https://www.instagram.com/deeepoceanedtech/">
                    <i class="fab fa-instagram"></i>
                  </a>
                  <a target="_blank" href="https://www.youtube.com/channel/UCNabmmQ-_9J0WxvUxCoykBA">
                    <i class="fab fa-youtube"></i>
                  </a>
                </div>
                {{--  <button class="btn btn-outline-primary btn-sm">SHARE NOW</button> --}}
              </div>
            </div>
            <hr class="footer-line">
            <div class="row bottom-links">
              <div class="col-md-6 col-12">
                <p>COPYRIGHT Ⓒ 2022 DEEEPOCEAN- ALL RIGHTS RESERVED</p>
              </div>
              <div class="col-md-6 col-12 tnc">
                <p> <a href="#"  data-toggle="modal" data-target="#myModal">  T&C </a> | <a href="{{route('p.p')}}"  >   PRIVACY POLICY </a></p>
              </div>
            </div>
          </div>
        </footer>
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
              $tc2=DB::table('term_condition')->where('id','1')->first();
              @endphp
              <div class="modal-body">
                <p> {{@$tc2->text}}</p>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="modal" id="myModal2">
          <div class="modal-dialog">
            <div class="modal-content">
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Privacy and Policy</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <!-- Modal body -->
              @php
              $tc2=DB::table('term_condition')->where('id','3')->first();
              @endphp
              <div class="modal-body">
                <p> {{@$tc2->text}}</p>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Ok</button>
              </div>
            </div>
          </div>
        </div> --}}
        <!-- bootstrap -->
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
        crossorigin="anonymous"
        ></script>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
        crossorigin="anonymous"
        ></script>
      </body>
    </html>