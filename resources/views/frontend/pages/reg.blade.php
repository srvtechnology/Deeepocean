@extends('admin.layouts.app')
@section('title')
@endsection
<head>


  <!-- Required meta tags -->
  {{-- <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
    crossorigin="anonymous"
    />
    <title>Sign | Up</title>
    <link rel="stylesheet" href="{{url('/')}}/assets/css/thank-you.css" />
    <link rel="stylesheet" href="{{url('/')}}/assets/css/sign-up.css" />
    <link rel="stylesheet" href="{{url('/')}}/assets/css/main.css" />
    <link rel="stylesheet" href="{{url('/')}}/assets/css/index.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}


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
          <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2HXT9TQQNR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2HXT9TQQNR');
</script>
         <!-- -------------fabicon-------------   -->
          <link rel="icon" type="image/x-icon" href="{{url('/')}}/assets/img/logo-d.ico">
          <style>
          .input-placeholder {
          position: relative;
          }
          .input-placeholder select:valid + .placeholder {
            display: none;
          }
          .input-placeholder input[name="name"]:valid + .placeholder {
            display: none;
          }
          .input-placeholder input.place-1:placeholder-shown + .placeholder {
          display: block;
          }
          .input-placeholder input.place-1:not(:placeholder-shown) + .placeholder {
          display: none;
          }
         
          .placeholder {
          position: absolute;
          pointer-events: none;
          top: 7px;
          bottom: 2px;
          left: 15px;
          margin: auto;
          color: #797979;
          background: #fff;
          opacity: 1;
          text-transform: capitalize;
          font-size:16px;
          }
          .placeholder span {
          color: red;
          }
          input::placeholder{
          color:red
          }
          @media only screen and (min-width: 1600px) and (max-width: 2560px) {
  .container{
    max-width: 1850px
  }
}
          </style>
        </head>
        
        @section('content')
       {{--  <div class="main-header1">
          <a href="{{route('index.page')}}"><img src="{{url('/')}}/assets/img/logo-d.png" alt="" /></a>
        </div> --}}
        <div class="main-header2">
          <a href="{{route('index.page')}}"><img src="{{url('/')}}/assets/img/logo-new.png" alt="" /></a>
        </div>
        <div class="dropdown-divider w-75 mx-auto mb-4"></div>
        <!-- -- Start Sign-up-new --  -->
        <div class="sign-up sing-up-one mx-auto">
          <div class="row">
            <center>
            @include('admin.include.message')
            <h3>REGISTRATION FORM</h3>
            <div class="col-md-6 col-12">
              <div class="form-card">
                <form method="post" action="{{route('reg.one')}}" id="frm">
                  @csrf
                  <div class="form-inner-card">
                    <div class="input-placeholder">
                      <input type="text" name="name" class="form-control" required style="margin-bottom: 10px" />
                      <div class="placeholder">
                        Name<span> *</span>
                      </div>
                    </div>
                    <div class="form-inner-card">
                      <div class="input-placeholder">
                        <input type="text" name="email" class="form-control place-1" required 
                        pattern="^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$"
                        onchange="this.setAttribute('value', this.value);" placeholder=" "
                         style="margin-bottom: 10px" />
                        <div class="placeholder">
                          email<span> *</span>
                        </div>
                      </div>
                      <div class="form-inner-card">
                        <div class="input-placeholder">
                          <input type="tel" name="ph" class="form-control place-1" step="any" minlength="10" placeholder=" " style="margin-bottom: 10px"  pattern="^\d{10}$" title="Please enter 10 digit number" required />
                          <div class="placeholder">
                            phone number<span> *</span>
                          </div>
                        </div>
                        <!-- --select box-- -->
                        <div class="input-placeholder">
                          <select class="form-control" name="course" required style="margin-bottom: 10px">
                            <option value="" style="display: none"></option>
                            @php
                            $courses=DB::table('course')->where('status','A')->orderBy('id','desc')->get();
                            @endphp
                            @foreach($courses as $val)
                            <option value="{{@$val->id}}">{{@$val->name}}</option>
                            
                            @endforeach
                          </select>
                          <div class="placeholder">
                            Select A course<span> *</span>
                          </div>
                        </div>
                        <!-- <input type="text" name="name" class="form-control" placeholder="NAME*" required style="margin-bottom: 10px" /> -->
                        <!-- <input type="text" name="email" class="form-control" placeholder="EMAIL" required pattern="^([A-Za-z0-9_\-\.]+)@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*(\.[A-Za-z]{2,3})$" style="margin-bottom: 10px" /> -->
                        <!-- <input type="tel" name="ph" class="form-control" step="any" placeholder="PHONE NUMBER" minlength="10" style="margin-bottom: 10px"  pattern="^\d{10}$" title="Please enter 10 digit number" required /> -->
                        <!-- <select class="form-control" name="course" required style="margin-bottom: 10px">
                          <option value="">SELECT A COURSE</option>
                        </select> -->
                        <div class="captch" style="float: left ">
                          
                          <div class="capca_box ">
                            <div class="g-recaptcha " data-sitekey="6LdQvfsdAAAAAOkSK0mwHTPL10qOmHiV9Lhs8DW4" data-callback="moCaptcha">
                            </div>
                          </div>
                          <span class="moCaptchaError" style="color:red;display: none; ">Please complete the recaptcha</span>
                        {{-- </div> --}}
                      </div>
                      
                      
                      <div class="btn-div">
                        <button class="btn-hover" type="submit">SUBMIT</button>
                        
                      </div>
                    </form>
                  </div>
                </div>
                </center>
                
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
        
        @endsection