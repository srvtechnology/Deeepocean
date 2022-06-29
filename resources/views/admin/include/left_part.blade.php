@section('head')
@include('admin.include.head')
@endsection
<style>
.abc{
background-color:blue !important;
color:white !important;
}
.abc span{
color: white !important;
}
.fa-flag:before {
content: "\f024";

}
#sidebar-menu ul ul a {
/* color: #75798B; */
color: #597884;
display: block;
padding:15px 33px 9px 11px;
}
</style>
{{-- <body class="fixed-left"> --}}
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Top Bar Start -->
    <div class="topbar">
      <!-- LOGO -->
      <div class="topbar-left">
        <div class="text-center">
          <a href="{{route('admin.dashboard')}}" class="logo"><img src="{{url('/')}}/assets/img/logo-d-long.png" alt=""></a>
        </div>
      </div>
      <!-- Button mobile view to collapse sidebar menu -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="">
            <div class="pull-left">
              <button class="button-menu-mobile open-left"> <i class="fa fa-bars"></i> </button> <span class="clearfix"></span> </div>
              <!--<form class="navbar-form pull-left" role="search">
                <div class="form-group">
                  <input type="text" class="form-control search-bar" placeholder="Type here for search...">
                </div>
                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
              </form>-->
              <ul class="nav navbar-nav navbar-right pull-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">@if(@Auth::guard('admin')->user()->image)
                  <img src="{{url('/')}}/storage/app/public/admin/{{Auth::guard('admin')->user()->image}}" alt="" class="thumb-md img-circle">@else<i class='fas fa-user-tie' style='font-size:36px;color: black;'  ></i> @endif </a>
                  <ul class="dropdown-menu">
                    {{--  <li><a href="javascript:void(0)"><i class="fas fa-user-circle"></i> Profile</a></li> --}}
                    {{--  <li><a href="{{route('change.password')}}"><i class="fas fa-cog"></i> Change Password</a></li> --}}
                    <li><a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i> Logout</a></li>
                  </ul>
                </li>
              </ul>
            </div>
            <!--/.nav-collapse -->
          </div>
        </div>
      </div>
      <!-- Top Bar End -->
      <!-- ========== Left Sidebar Start ========== -->
      <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">
          <div class="user-details">
            <div class="pull-left"> {{-- <img src="{{url('/')}}/adminasset/assets/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle"> --}}@if(@Auth::guard('admin')->user()->image)
            <img src="{{url('/')}}/storage/app/public/admin/{{Auth::guard('admin')->user()->image}}" alt="" class="thumb-md img-circle">@else<i class='fas fa-user-tie' style='font-size:36px;color: black;'  ></i> @endif</div>
            <div class="user-info">
              <div class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Admin Panel<span class="caret"></span></a>
              <ul class="dropdown-menu">
                {{-- <li><a href="javascript:void(0)"><i class="fas fa-user-circle"></i> Profile</a></li> --}}
                {{--  <li><a href="{{route('change.password')}}"><i class="fas fa-cog"></i> Change Password</a></li> --}}
                <li> <a class="dropdown-item" href="{{ route('admin.logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"><i class="fas fa-power-off"></i>
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </div>
          <p class="text-muted m-0">{{@Auth::guard('admin')->user()->name}}</p>
        </div>
      </div>
      <!--- Divider -->
      <div id="sidebar-menu">
        <ul>
          <li> <a href="{{route('admin.dashboard.home')}}" class="{{request()->segment(2)=='dashboard'?'waves-effect active':''}}" ><i class="fas fa-chart-line"></i><span> Dashboard </span></a> </li>
          
          <li>
            <li> <a href="{{route('admin.edit.view')}}" class="{{request()->segment(2)=='edit-profile'?'waves-effect active':''}}" ><i class="fas fa-user-edit"></i><span> Edit Profile </span></a> </li>

          











             {{-- <li id="xyz"> <a href="#" id="abcd2" class="nav-link" ><i class="fas fa-flag"></i>   <span id="plus2" >User List <i class="fa fa-angle-down"></i>  </span> </a> 
            <ul class="nav nav-treeview" > --}}

               <li class="{{request()->segment(3)=='all-data'?' abc':''}}"><a href="{{route('paid.users')}}" class="{{request()->segment(3)=='all-data'?'waves-effect active abc':''}}"><i class="fas fa-book"></i><span>User List</span></a></li>
                
                <li class="{{request()->segment(3)=='success'?' abc':''}}"><a href="{{route('success.details')}}" class="{{request()->segment(3)=='success'?'waves-effect active abc':''}}"><i class="fas fa-check"></i><span>Success Pay List</span></a></li>

                 <li class="{{request()->segment(3)=='failed'?' abc':''}}"><a href="{{route('failed.details')}}" class="{{request()->segment(3)=='failed'?'waves-effect active abc':''}}"><i class="fas fa-times"></i><span>Failed Pay List</span></a></li>

                  <li class="{{request()->segment(3)=='inprogress'?' abc':''}}"><a href="{{route('inprogress.details')}}" class="{{request()->segment(3)=='inprogress'?'waves-effect active abc':''}}"><i class="fas fa-spinner"></i><span>InProgress Pay List </span></a></li>
           {{--  </ul> --}}










             </li>

             <li style=""><a href="{{route('promo.list')}}" class="{{request()->segment(2)=='users-promo-code'?'waves-effect active abc':''}}"><i class="fas fa-sitemap"></i><span>Users Promo Code </span></a></li>
            

            <li><a href="{{route('contact.list')}}" class="{{request()->segment(2)=='contact-us'?'waves-effect active abc':''}}"><i class="fas fa-address-book"></i><span>Contact Us </span></a></li>
         
            
           {{--  <li>
              
              <a href="#" class="nav-link" >
                
                <i class="fas fa-flag"></i>   CMS Management
              </a> --}}
               <li > <a href="#" id="abcd" class="nav-link" ><i class="fas fa-flag"></i>   <span id="plus" style="" {{-- onclick="plus()" --}}>CMS Management <i class="fa fa-angle-down"></i>  </span> </a> 
              <ul class="nav nav-treeview" >
                
                <li class="{{request()->segment(2)=='manage-course'?' abc':''}}"><a href="{{route('course.list')}}" class="{{request()->segment(2)=='manage-course'?'waves-effect active abc':''}}"><i class="fas fa-book"></i><span>Course Management </span></a></li>


                <li class="{{request()->segment(2)=='manage-subject'?' abc':''}}"><a href="{{route('subject.list')}}" class="{{request()->segment(2)=='manage-subject'?'waves-effect active abc':''}}"><i class="fas fa-book-open"></i><span>Subject Management </span></a></li>



                <li class="{{request()->segment(2)=='manage-paper'?'abc':''}}"><a href="{{route('paper.list')}}" class="{{request()->segment(2)=='manage-paper'?'waves-effect active abc':''}}"><i class="far fa-sticky-note"></i><span>Paper Management </span></a></li>

           {{--      <li><a href="{{route('paid.users')}}" class="{{request()->segment(2)=='paid-users'?'waves-effect active abc':''}}"><i class="icofont-tasks-alt"></i><span>Paid Users </span></a></li> --}}

                <li class="{{request()->segment(2)=='banner-management'?'abc':''}}"><a href="{{route('banner.page')}}" class="{{request()->segment(2)=='banner-management'?'waves-effect active abc':''}}"><i class="far fa-copy"></i><span>Banner Management </span></a></li>



                <li class="{{request()->segment(2)=='manage-inspiration'?'abc':''}}"><a href="{{route('insp.list')}}" class="{{request()->segment(2)=='manage-inspiration'?'waves-effect active abc':''}}"><i class="fas fa-user-tie"></i><span>Inspiration Management </span></a></li>


                <li class="{{request()->segment(2)=='manage-advisory'?' abc':''}}"><a href="{{route('adv.list')}}" class="{{request()->segment(2)=='manage-advisory'?'waves-effect active abc':''}}"><i class="fab fa-autoprefixer"></i><span>Advisory Management </span></a></li>



                <li  class="{{request()->segment(2)=='manage-product'?' abc':''}}"><a href="{{route('prod.list')}}" class="{{request()->segment(2)=='manage-product'?'waves-effect active abc':''}}"><i class="fab fa-product-hunt"></i><span>Product Management </span></a></li>

                {{-- <li><a href="{{route('contact.list')}}" class="{{request()->segment(2)=='contact-us'?'waves-effect active abc':''}}"><i class="icofont-tasks-alt"></i><span>Contact Us </span></a></li> --}}

                <li class="{{request()->segment(2)=='content-management'?' abc':''}}"><a href="{{route('static.list')}}" class="{{request()->segment(2)=='content-management'?'waves-effect active abc':''}}"><i class="icofont-tasks-alt"></i><span>Content Management </span></a></li>



                <li class="{{request()->segment(2)=='team-management'?'abc':''}}"><a href="{{route('team.list')}}" class="{{request()->segment(2)=='team-management'?'waves-effect active abc':''}}"><i class="fas fa-users"></i><span>Team Management </span></a></li>

                  <li class="{{request()->segment(2)=='terms_conditions'?'abc':''}}"><a href="{{route('term.list')}}" class="{{request()->segment(2)=='terms_conditions'?'waves-effect active abc':''}}"><i class="fas fa-users"></i><span>Terms and Condition </span></a></li>

                   <li class="{{request()->segment(2)=='footer-management'?'abc':''}}"><a href="{{route('footer.page')}}" class="{{request()->segment(2)=='footer-management'?'waves-effect active abc':''}}"><i class="fas fa-users"></i><span>Footer Management </span></a></li>
                
              </ul>
            </li>

          
          
          
          
        </ul>
         </div>
        <div class="clearfix"></div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- Left Sidebar End -->
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    @if(Route::is('admin.dashboard.home') || Route::is('admin.edit.view') || Route::is('contact.list')  || Route::is('promo.list')  || Route::is('promo.details') || Route::is('paid.users') || Route::is('success.details') || Route::is('failed.details') || Route::is('inprogress.details') || Route::is('view.details'))
    $("#plus").html('CMS Management <i class="fa fa-angle-down" aria-hidden="true">  </i> ');
    //$("#minus").hide();view.details
    @else
    $("#plus").html('CMS Management <i class="fa fa-angle-right" aria-hidden="true"></i> ');
     // $("#minus").show();
     $("#abcd").trigger('click');
    @endif
  });
  

  $("#abcd").click(function(){
    //console.log($('#plus').html());
    //alert("jlj");
   
     if ($('#plus').html() == 'CMS Management <i class="fa fa-angle-down" aria-hidden="true">  </i> ') {
      $("#plus").html( 'CMS Management <i class="fa fa-angle-right" aria-hidden="true"></i> ');
     } 
     else if($('#plus').html() == 'CMS Management <i class=" fa fa-angle-right" aria-hidden="true"></i> '){
       $("#plus").html('CMS Management <i class="fa fa-angle-down" aria-hidden="true">  </i> ');
     }
     else {
      $("#plus").html('CMS Management <i class="fa fa-angle-down" aria-hidden="true">  </i> ');
     }
  });
</script>




{{--   @if(Route::is('paid.users') || Route::is('success.details') || Route::is('failed.details') || Route::is('inprogress.details'))
    
    $("#abcd2").trigger('click');
     $("#plus2").html('User List <i class="fa fa-angle-right" aria-hidden="true"></i> ');
    @else
   $("#plus2").html('User List <i class="fa fa-angle-down" aria-hidden="true">  </i> ');
    //$("#minus").hide();
    @endif
  }); --}}
{{-- <script>



   $(document).ready(function(){
   @if(Route::is('paid.users') || Route::is('success.details') || Route::is('failed.details') || Route::is('inprogress.details'))
  $("#plus2").html('User List <i class="fa fa-angle-right" aria-hidden="true"></i> ');
    //$("#minus").hide();
       $("#abcd2").trigger('click');
        $("#xyz").trigger('click');
    @else
    $("#plus2").html('User List <i class="fa fa-angle-down" aria-hidden="true">  </i> ');
   
    @endif
  });
  
  
</script>
<script>
  $("#abcd2").click(function(){
   
    //console.log($('#plus2').html());
   
     if ($('#plus2').html() == 'User List <i class="fa fa-angle-down" aria-hidden="true">  </i> ') {
      $("#plus2").html( 'User List <i class="fa fa-angle-right" aria-hidden="true"></i> ');
     } 
     else if($('#plus2').html() == 'User List <i class=" fa fa-angle-right" aria-hidden="true"></i> '){
       $("#plus2").html('User List <i class="fa fa-angle-down" aria-hidden="true">  </i> ');
     }
     else {
      $("#plus2").html('User List <i class="fa fa-angle-down" aria-hidden="true">  </i> ');
     }
  });
</script> --}}