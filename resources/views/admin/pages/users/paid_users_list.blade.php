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
					<h4 class="pull-left page-title">User list</h4>
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
							   <form role="form" method="post" accept="{{route('paid.users')}}">
								@csrf
								<div class="form-group">
									<label for="">Select Status </label>
									<select class="form-control rm06" name="status" required>
										<option value="">Select</option>
										<option value="3" @if(@$res=="3") selected @endif>In Progress</option>
										<option value="1"@if(@$res=="1") selected @endif>Paid</option>
										<option value="2"@if(@$res=="2") selected @endif>Failed</option>
										
									</select>
								</div>
								<div class="rm05">
									<button class="btn btn-primary waves-effect waves-light w-md" type="submit">Search</button>
								</div>
							</form>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="table-responsive">
										<table id="example" class="table">
											<thead>
												<tr>
													<th>S.NO</th>
													<th>Customer name</th>
													<th>Mobile</th>
													
													<th>Amount</th>
													<th>Transaction ID</th>
													<th>Status</th>
													<th>Promo Code Count</th>
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
													$promo=DB::table('promo_code_master')->where('user_id',$value->customer_id)->first();

													@endphp
													<td>
														@if($promo)
													
															@if($promo->total_count=="0")
															N/A
															@else
															{{$promo->total_count}}
															@endif


														@else
														N/A
														@endif
														
													</td>

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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
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
@endsection