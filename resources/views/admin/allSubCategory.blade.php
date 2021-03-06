
@extends('admin_layout')
@section('dashboard_content')
	<ul class="breadcrumb">
		<li>
			<i class="icon-home"></i>
			<a href="index.html">Home</a> 
			<i class="icon-angle-right"></i>
		</li>
		<li><a href="#">All Sub-Category</a></li>
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
				<h2><i class="halflings-icon user"></i><span class="break"></span>All Sub-Category</h2>
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
						  <th>Sub-Category Id</th>
						  <th>Sub-Category Name</th>
						  <th>Category Name</th>
						  <th>Sub-Category Description</th>
						  <th>Status</th>
						  <th>Actions</th>
					  </tr>
				  </thead>   
				  @foreach($allSubCategory as $category)
				  <tbody>
					<tr>
						<td>{{$category->id}}</td>
						<td class="center">{{$category->sub_category_name}}</td>
						<td class="center">{{$category->category->category_name}}</td>
						<td class="center">{{$category->sub_category_description}}</td>
						<td class="center">
							@if($category->publication_status == 1)
								<span class="label label-success">active</span>
							@else
								<span class="label label-warning">pending</span>
							@endif
						</td>
						<td class="center">
						  @if($category->publication_status == 1)
							<a class="btn btn-success" href="{{URL::to('/unactive_subcategory/'.$category->id)}}">
								<i class="halflings-icon white thumbs-up"></i> 
							</a>
							@else
								<a class="btn btn-warning" href="{{URL::to('/active_subcategory/'.$category->id)}}">
									<i class="halflings-icon white thumbs-down"></i> 
								</a>
							@endif
							<a class="btn btn-info" href="{{URL::to('/editSubCategory/'.$category->id)}}">
								<i class="halflings-icon white edit"></i>  
							</a>
							<a class="btn btn-danger" href="{{URL::to('/deleteSubCategory/'.$category->id)}}" id="delete">
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