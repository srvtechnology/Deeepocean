@extends('admin.layouts.app')
@section('title')
<title>Admin | Team Management</title>
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
					<h4 class="pull-left page-title">Team Management list</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
						<li class="active">Team Management list</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					@include('admin.include.message')
					{{--  <div class="add-btn "><a href="{{route('prod.add.form')}}"><i class="icofont-plus-circle"></i> Add</a></div> --}}
					<div class="clearfix"></div>
					<div class="panel panel-default">
						<div class="panel-heading rm02 rm04">
						
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>S.NO</th>
													<th>Position </th>
													 <th>Name</th>
													{{-- <th>Mobile</th>
 --}}													
													
													<th class="rm07">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($team as $key=> $value)
												<tr>
													<td>{{ $key+ $team->firstItem() }}</td>
													<td>{{@$value->role}}</td>
													<td>{{@$value->name}}</td>
													
													
													<td class="rm07">
														<a href="javascript:void(0);" class="action-dots"  id="action{{$value->id}}"><img src="{{url('/')}}/adminasset/assets/images/action-dots.png" alt="" onclick="fun({{$value->id}})"></a>
														<div class="show-actions" id="show-action{{$value->id}}" style="display: none;"> <span class="angle"><img src="{{url('/')}}/adminasset/assets/images/angle.png" alt=""></span>
														<ul>
															<li><a href="{{route('team.edit',$value->id)}}">Edit</a></li>
															<li><a href="{{route('team.view',$value->id)}}">View</a></li>
															
															
															
														</ul>
													</div>
												</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							
								{!!$team->links()!!}
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
@endsection