@extends('admin.layouts.app')
@section('title')
<title>Admin | User Promo Code Details</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
{{-- for datepicker --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
	#example_length{
		display: none;
	}
	#example_filter{
		display: none;
	}
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
		
		
		<div class="wraper container-fluid">
			
			<div class="row">
				<div class="col-sm-12">
					<h4 class="pull-left page-title">User Promo Code</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
						
						<li class="active">User Promo Code</li>
					</ol>
				</div>
			</div>
			<div class="add-btn "><a href="{{route('promo.list')}}"><i class="icofont-minus-circle"></i> back</a></div>
			
			<div class="row">
				<div class="col-lg-12">
					
					<div>
						
						<div class="row">
							<div class="col-md-6">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">User Promo Code Information</h3>
									</div>
									<div class="panel-body">
										<div class="about-info-p">
											<strong> Name</strong>
											<br>
											<p class="text-muted">{{@$promo_users->getUserDetails->name}}</p>
										</div>
										<div class="about-info-p">
											<strong>Mobile </strong>
											<br>
											<p class="text-muted">{{@$promo_users->getUserDetails->mobile}}</p>
										</div>
										<div class="about-info-p">
											<strong>Email </strong>
											<br>
											<p class="text-muted">{{@$promo_users->getUserDetails->email}}</p>
										</div>
										
										
									</div>
								</div>
								
							</div>
							<div class="col-md-6">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">User Promo Code Information</h3>
									</div>
									<div class="panel-body">
										
										
										<div class="about-info-p">
											<strong>His Promo Code</strong>
											<br>
											<p class="text-muted">{{@$promo_users->promo_code}}</p>
										</div>
										<div class="about-info-p">
											<strong>Total No of users who used his promo code is:</strong>
											<br>
											<p class="text-muted">{{@$promo_users->total_count}}</p>
										</div>
										
									</div>
								</div>
								
							</div>
						</div>
						<h3 style="margin-top: 20px">NO OF USER JOINED WITH THIS PROMO CODE</h3>
						<div class="panel-body" style="background-color: white">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="table-responsive">
										
											<table  id="example" class="table">
											<thead>
												<tr>
													<th>User Id</th>
													<th>User Name</th>
													<th>User Email</th>
													<th>User Mobile</th>
													<th>Course</th>
													<th>Subject</th>
													<th>Paper</th>
													<th>Time</th>
												</tr>
											</thead>
											<tbody>
												@if(count($usersDetails)>0)
												@foreach($usersDetails as $val)
												<tr>
													
													<td>{{ $val->id }}</td>
													<td>{{$val->name}}</td>
													<td>{{$val->email}}</td>
													<td>{{$val->mobile}}</td>
													<td>{{$val->getCourseDetails->name}}</td>
													<td>{{$val->getSubjectDetails->name}}</td>
													<td>{{$val->getPaperDetails->name}}</td>
													<td>{{$val->created_at}}</td>
													
												</tr>
												@endforeach
												@else
												<p class="text-muted" style="text-align: center;">	No Users Used his promo code.</p>
												@endif
											</tbody>
										</table>
									</div>
								
									{!!$usersDetails->links()!!}
								</div>
							</div>
						</div>
						
						
						
						
					</div>
				</div>
			</div>
			</div> <!-- container -->
			
			</div> <!-- content -->
			
		</div>
		<!-- ============================================================== -->
		<!-- End Right content here -->
		<!-- ============================================================== -->
		<!-- End Right content here -->
		@section('footer')
		@include('admin.include.footer')
		@endsection
		@endsection
		{{-- end content --}}
		@section('script')
		@include('admin.include.script')
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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

"order": [[ 0, 'desc' ]]
} );
});

</script>
		@endsection