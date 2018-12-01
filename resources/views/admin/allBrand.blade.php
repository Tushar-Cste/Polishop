@extends('admin_layout')
@section('dashboard_content')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">All brands</a></li>
	</ul>

	<p class="alert-success">
		@php 
			$message = Session::get('message');
			echo $message;
			if($message)
				Session::put('message',null);
		@endphp
	</p>

	<div class="row-fluid sortable">		
		<div class="box span12">
			<div class="box-header" data-original-title>
				<h2><i class="halflings-icon user"></i><span class="break"></span>All brands</h2>
				<div class="box-icon">
					<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
					<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
					<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
				</div>
			</div>
			
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
				  <thead>
					  <tr>
						  <th>brand Id</th>
						  <th>brand Name</th>
						  <th>brand Image</th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  @foreach($allBrand as $brand)
				  <tbody>
					<tr>
						<td>{{$brand->id}}</td>
						<td class="center">{{$brand->brand_name}}</td>
						<td class="center"><img src="/storage/brand_logos/{{$brand->brand_logo}}" style="width: 100px; height: 80px;" ></td>
						
						<td class="center">
						  
							<a class="btn btn-info" href="{{URL::to('/editbrand/'.$brand->id)}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{URL::to('/deletebrand/'.$brand->id)}}" id="delete">
								<i class="halflings-icon white trash"></i> 
							</a>
						</td>
					</tr>
					
				  </tbody>
				  @endforeach
			  </table>            
			</div>
		</div><!--/span-->
	
	</div><!--/row-->

@endsection 