@extends('admin_layout')
@section('dashboard_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="index.html">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Edit Brand</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand</h2>
		</div>
		<p class="alert-success">
			@php 
				$message = Session::get('message');
				echo $message;
				if($message)
					Session::put('message',null);
			@endphp
			</p>
		<div class="box-content">
			<form class="form-horizontal" enctype="multipart/form-data" action="{{url('/updateBrand/'.$brand->id)}}" method="post">
			{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="ProductName">Brand Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="brand_name" value="{{$brand->brand_name}}">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="ProductName">Brand Logo</label>
				  <div class="controls">
					<input type="file" class="input-xlarge" id="ProductName" name="brand_logo">
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="publicationStatus">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" class="input-xlarge" id="publicationStatus" name="publication_status" value="1">
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Edit Brand</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection