@extends('admin.layouts.app')
@section('title')
<title>Admin | Users Promo Code</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
<style>
	/*#example_length{
		display: none;
	}*/
	/*#example_filter{
		display: none;
	}*/
	#example_info{
		display: none;
	}
</style>
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
					<h4 class="pull-left page-title">Users Promo Code list</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard.home')}}">DEEEP OCEAN</a></li>
						<li class="active">Users Promo Code list</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					@include('admin.include.message')
					{{-- <div class="add-btn " style="float: left"><a href="{{route('admin.manage.template.add.view')}}"><i class="icofont-plus-circle"></i> Add</a></div> --}}
					<div class="clearfix"></div>
					<div class="panel panel-default">
						<div class="panel-heading rm02 rm04">
							
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="table-responsive">
										<table  id="example" class="table">
											<thead>
												<tr>
													<th>S.NO</th>
													<th>User Name</th>
													<th>User Email</th>
													<th>Promo Code</th>
													
													<th>Total Used By</th>
													
													
													<th class="rm07">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($promo_users as $key=> $value)
												<tr>
													<td>{{-- {{@$key+ @$promo_users->firstItem() }} --}}</td>
													<td>{{@$value->getUserDetails->name}}</td>
													<td>{{@$value->getUserDetails->email}}</td>
													
													<td>
														{{$value->promo_code}}
													</td>
													<td style="margin-left: 10px">
														{{$value->total_count}}
													</td>
													{{-- <td>{{@$value->userDetails->email}}</td> --}}
													
													
													
													
													
													
													
													<td class="rm07">
														<a href="javascript:void(0);" class="action-dots"  id="action{{$value->id}}"><img src="{{url('/')}}/adminasset/assets/images/action-dots.png" alt="" onclick="fun({{$value->id}})"></a>
														<div class="show-actions" id="show-action{{$value->id}}" style="display: none;"> <span class="angle"><img src="{{url('/')}}/adminasset/assets/images/angle.png" alt=""></span>
														<ul>
															
															<li><a href="{{route('promo.details',$value->id)}}">View Details </a></li>
															<li><a onclick="return confirm('Are you sure want to delete?')" href="{{route('promo.delete',$value->id)}}">Soft Delete</a></li>

															
															
															
															
															
															
															
														</ul>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
								
								{{-- {!!$promo_users->links()!!} --}}
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
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
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
//"order": [[ 4, 'desc' ]]
} );

t.on( 'order.dt search.dt', function () {
t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
cell.innerHTML = i+1;
} );
} ).draw();
} );
</script>
@endsection