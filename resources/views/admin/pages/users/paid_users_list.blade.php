@extends('admin.layouts.app')
@section('title')
<title>Admin | User list</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
@endsection
@section('content')



<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
					<h4 class="pull-left page-title">User list {{request()->segment(3)}}</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
						<li class="active">User list</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					@include('admin.include.message')
					{{-- <div class="add-btn " style="float: left"><a href="{{route('course.add.form')}}"><i class="icofont-plus-circle"></i> Add</a></div> --}}
				
             



					<div class="clearfix"></div>
					<div class="panel panel-default">
						<div class="panel-heading rm02 rm04">
							 @if (Route::is('paid.users'))
							   <form class="frm" role="form" method="post" accept="{{route('paid.users')}}">
							   	@elseif(Route::is('success.details'))
							   	<form class="frm" role="form" method="post" accept="{{route('success.details')}}">
							   	@elseif(Route::is('failed.details'))
							   	<form class="frm" role="form" method="post" accept="{{route('failed.details')}}">
						   		@else
                             	<form class="frm" role="form" method="post" accept="{{route('inprogress.details')}}">
						   		@endif
								@csrf
							{{-- 	<div class="form-group">
									<label for="">Select Status </label>
									<select class="form-control rm06" name="status" required>
										<option value="">Select</option>
										<option value="3" @if(@$res=="3") selected @endif>In Progress</option>
										<option value="1"@if(@$res=="1") selected @endif>Paid</option>
										<option value="2"@if(@$res=="2") selected @endif>Failed</option>
										
									</select>
								</div> --}}
							{{-- 	<script>
									function from_fun(){
										var fromVal=$("#from_date").val();
										$("#from_date_exp").val(fromVal);

									}

									function to_fun(){
										var toVal=$("#to_date").val();
										$("#to_date_exp").val(toVal);
										
									}
								</script> --}}
								 <div class="form-group">
				                  <label for="CategoryName">From date</label>
				                  <input type="text"  id="from_date" class="form-control" name="from_date" autocomplete="off" value="{{@$res['from_date']}}" placeholder="Enter date" onchange="from_fun()" >
				                </div>

				                <div class="form-group">
				                  <label for="CategoryName">To date</label>
				                  <input type="text"  id="to_date" class="form-control" name="to_date" autocomplete="off" value="{{@$res['to_date']}}" placeholder="Enter date" onchange="to_fun()" >
				                </div>
								<div class="rm05">
									<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Search</button>
								</div>
							</form>
							<div class="rm05" style="float: right;">
							<button class="btn btn-primary waves-effect waves-light w-md"  @if (Route::is('paid.users')) onclick="location.href='{{route('paid.users')}}'" 	@elseif(Route::is('success.details'))  onclick="location.href='{{route('success.details')}}'"   	@elseif(Route::is('failed.details'))   onclick="location.href='{{route('failed.details')}}'"   @else  onclick="location.href='{{route('inprogress.details')}}'"   @endif >Reset</button>
							</div>
							{{-- @endif --}}
						</div>
						  <form role="form" id="frm2" method="post" action="{{route('manage.export')}}">
                  @csrf
                  <input type="hidden" name="status_id"   @if(Route::is('paid.users')) value="0"  @elseif(Route::is('success.details')) value="1"  @elseif(Route::is('failed.details')) value="2"  @else value="3"  @endif  >
                    <div class="form-group">
	                 {{--  <label for="CategoryName">Export From date</label> --}}
	                  <input type="hidden"  id="from_date_exp" class="form-control" name="from_date_exp" autocomplete="off" value="{{@$res['from_date']}}" placeholder="Enter from date" >
	                </div>

	                <div class="form-group">
	                 {{--  <label for="CategoryName">Export To date</label> --}}
	                  <input type="hidden"  id="to_date_exp" class="form-control" name="to_date_exp" autocomplete="off" value="{{@$res['to_date']}}" placeholder="Enter to date" >
	                </div>
                  <div class="rm05" style="float: right;padding-right: 20px; padding-bottom: 10px;">
                    <button class="btn btn-primary waves-effect waves-light w-md" type="submit"><i class="fas fa-file-excel"></i> Exports</button>
                  </div>
                </form>


						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="table-responsive" style="width: 100%;overflow-x: scroll;">
										<table id="example" class="table">
											<thead>
												<tr>
													<th>S.NO</th>
													<th>Customer name</th>
													<th>Mobile</th>
													<th>Fee</th>
													<th>Facilitation Fees</th>
													
													
													<th>GST</th>
													<th>Amount</th>
													<th>Transaction ID</th>
													<th>Status</th>
													<th>Promo Code Used</th>
													<th>Date</th>
													<th class="rm07">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($users as $key=> $value)
												<tr>
													<td></td>
													
													<td>{{$value->customerName}}</td>
													<td>{{@$value->getUserDetails->mobile}}</td>
													<td>{{@$value->getUserDetails->getCourseDetails->due_amount}}</td>
													<td>{{@$value->getUserDetails->getPaperDetails->amount}}</td>
													
													<td>{{round($value->gst,2)}}</td>
													<td>{{$value->amount}}</td>
													<td>@if($value->transaction_id)
														{{$value->transaction_id}}
														@else
														N/A
														@endif
													</td>
													@if($value->status_id=="1")
													<td class="green">Success </td>
													@elseif($value->status_id=="2")
													<td style="color: red">Failed </td>
													@else
													<td style="color: orange">In progress </td>
													@endif

													@php
													$promo=DB::table('promo_code_master')->where('user_id',@$value->getUserDetails->promo_code_user_id)->first();

													@endphp
													<td>
														 @if($promo)
														 {{@$promo->promo_code}}
 
														 @else
														 N/A

														 @endif
													</td>
													{{-- <td>
														@if($promo)
													
															@if($promo->total_count=="0")
															N/A
															@else
															{{$promo->total_count}}
															@endif


														@else
														N/A
														@endif
														
													</td> --}}

													<td>@if($value->updated_at)
														{{$value->updated_at}}
														@else
														{{$value->created_at}}
														@endif
													</td>
													
													
													
													
													<td class="rm07">
														<a href="javascript:void(0);" class="action-dots"  id="action{{$value->id}}"><img src="{{url('/')}}/adminasset/assets/images/action-dots.png" alt="" onclick="fun({{$value->id}})"></a>
														<div class="show-actions" id="show-action{{$value->id}}" style="display: none;"> <span class="angle"><img src="{{url('/')}}/adminasset/assets/images/angle.png" alt=""></span>
														<ul>
															<li><a href="{{route('view.details',$value->id)}}">View</a></li>
                                                             @if (Route::is('paid.users'))
															<li><a href="{{route('edit.user.details',$value->id)}}">Edit User</a></li>
															@endif

														{{-- 	@if (Route::is('paid.users') || Route::is('inprogress.details'))
															@if($value->status_id=="3") --}}
															<li><a onclick="return confirm('Are you sure want to delete?')" href="{{route('delete.soft',$value->id)}}">Soft Delete</a></li>

															{{-- @endif
															@endif --}}
															
															
															
														</ul>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								{{--  <ul class="pagination">
									<li class="paginate_button previous disabled"><a href="#">Previous</a></li>
									<li class="paginate_button active"><a href="#">1</a></li>
									<li class="paginate_button"><a href="#">2</a></li>
									<li class="paginate_button"><a href="#">3</a></li>
									<li class="paginate_button"><a href="#">4</a></li>
									<li class="paginate_button"><a href="#">5</a></li>
									<li class="paginate_button"><a href="#">6</a></li>
									<li class="paginate_button next"><a href="#">Next</a></li>
								</ul> --}}
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End row -->
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
<script>
var resizefunc = [];
</script>
<script>
function fun(id){
$('.show-actions').slideUp();
$("#show-action"+id).show();
}
function Cancel(id){
$("#show-action"+id).hide();
}
$(document).mouseup(function(e)
{
var container = $(".show-actions");
// if the target of the click isn't the container nor a descendant of the container
if (!container.is(e.target) && container.has(e.target).length === 0)
{
container.hide();
}
});
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script>
	$(document).ready(function() {
var t = $('#example').DataTable( {
	"pageLength":10,
"columnDefs": [ {
"searchable": false,
"orderable": false,
"targets": 0
} ],
"columnDefs": [

   
    { "width": "15%", "targets": 4 },
  

 ],
// "order": [[ 4, 'desc' ]]
} );

t.on( 'order.dt search.dt', function () {
t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
cell.innerHTML = i+1;
} );
} ).draw();
} );
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 <script>
    $(document).ready(function(){
    
    var min = new Date();
    $("#from_date").datepicker({
   
    dateFormat:"yy-mm-dd"
    });
    $("#to_date").datepicker({
   
    dateFormat:"yy-mm-dd"
    });

    //  $("#from_date_exp").datepicker({
   
    // dateFormat:"yy-mm-dd"
    // });

    //   $("#to_date_exp").datepicker({
   
    // dateFormat:"yy-mm-dd"
    // });
    });
    </script>

    <script>

//var d = new Date();
$('.frm').validate({

    submitHandler: function (form) {
      var val1 = new Date($('#from_date').val());
      var val2 = new Date($('#to_date').val());
       


console.log(val1);
console.log(val2);

//return false;

        var flag = 0;
      /*  */
      if( val2 == "Invalid Date" && val1=="Invalid Date" ) {
       flag = 1;
       alert("please enter dates");
       return false;
      }
    

  else if(val1 != "" && val2 == "Invalid Date" ) {
        flag = 1;
        alert('Please enter other date field ');
      }
      else if(val1 == "Invalid Date" && val2 != "" ) {
        flag = 1;
        alert('Please enter other date field ');
      }




      else if(val1 > val2) {
        console.log('max');
        console.log(val1);
        console.log(val2);
        flag = 1;
        alert(' from date cannot be greater than to date');
      }




      if(flag == 1)
        return false;
      else
        form.submit();
    }
  });
      </script>




@endsection