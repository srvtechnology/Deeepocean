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
          {{-- <div class="col-md-4 col-8 footer-menu">
            <ul>
              <li><a href="#">Payment Policy</a></li>
              <li><a href="#">Refund Policy</a></li>
              <li><a href="#">Financial Data Record Policy</a></li>
            </ul>
          </div> --}}
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
        @include('frontend.pages.tc_pp')
        </div>
      </div>
    </footer>