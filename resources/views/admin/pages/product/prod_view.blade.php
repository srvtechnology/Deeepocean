@extends('admin.layouts.app')
@section('title')
<title>Admin | View Product</title>
@endsection
@section('left_part')
@include('admin.include.left_part')
{{-- for datepicker --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
					<h4 class="pull-left page-title">Product Page</h4>
					<ol class="breadcrumb pull-right">
						<li><a href="{{route('admin.dashboard')}}">DEEEP OCEAN</a></li>
						
						<li class="active">Product Page</li>
					</ol>
				</div>
			</div>
			<div class="add-btn "><a href="{{route('prod.list')}}"><i class="icofont-minus-circle"></i> back</a></div>
			
			<div class="row">
				<div class="col-lg-12">
					
					<div>
						
						<div class="row">
							<div class="col-md-6">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Product Information</h3>
									</div>
									<div class="panel-body">
										<div class="about-info-p">
											<strong>Product Name</strong>
											<br>
											<p class="text-muted">{{@$prod->name}}</p>
										</div>
										<div class="about-info-p">
											<strong>Link </strong>
											<br>
											<p class="text-muted">{{@$prod->link}}</p>
										</div>

										<div class="about-info-p">
											<strong>Product description</strong>
											<br>
											<p class="text-muted">{{@$prod->text}}</p>
										</div>
										
										<div class="about-info-p m-b-0">
											<strong>Product Status</strong>
											<br>
											@if(@$prod->status=="A")
											<p class="text-muted">Active</p>
											@else
											<p class="text-muted">Inactive</p>
											
											@endif
										</div>
									</div>
								</div>
								<!-- Personal-Information -->
								<!-- Languages -->
								
								<!-- Languages -->
							</div>
							<div class="col-md-6">
								<!-- Personal-Information -->
								<div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Product Information</h3>
									</div>
									<div class="panel-body">
										<div class="about-info-p">
											<strong>Image </strong>
											<br>
											<img src="{{url('/')}}/storage/app/public/product/{{@$prod->image}}" style="width: 300px;">
										</div>
										
										<div class="about-info-p">
											<strong>Time</strong>
											<br>
											<p class="text-muted">{{@$prod->created_at}}</p>
										</div>
										
										
									</div>
								</div>
								<!-- Personal-Information -->
								<!-- Languages -->
								{{--  <div class="panel panel-default panel-fill">
									<div class="panel-heading">
										<h3 class="panel-title">Languages</h3>
									</div>
									<div class="panel-body">
										<ul>
											<li>English</li>
											<li>Franch</li>
											<li>Greek</li>
										</ul>
									</div>
								</div> --}}
								<!-- Languages -->
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
		@endsection