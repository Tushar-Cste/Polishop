@extends('admin_layout')
@section('dashboard_content')
<ul class="breadcrumb">
	<li>
		<i class="icon-home"></i>
		<a href="/dashboard">Home</a>
		<i class="icon-angle-right"></i> 
	</li>
	<li>
		<i class="icon-edit"></i>
		<a href="#">Update Product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Update Product</h2>
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
			<form class="form-horizontal" enctype="multipart/form-data" action="{{url('/updateProduct/'.$product->id)}}" method="post">
			{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_name" value="{{$product->product_name}}">
				  </div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selectError3" >Select Category</label>
					<div class="controls">
					  <select id="selectError3" name="category_id">
					  	<option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
					  	@php 
					  		use App\Category;
					  		$all_category = Category::where('publication_status','=',1)->get();
					  	@endphp
					  	@foreach($all_category as $category)
						<option value="{{$category->id}}">{{$category->category_name}}</option>
						@endforeach
					  </select>
					</div>
				  </div>
				<div class="control-group">
					<label class="control-label" for="selectError3">Select Sub-Category</label>
					<div class="controls">
					  <select id="selectError3" name="sub_category_id">
					  	<option value="{{$product->subcategory_id}}">{{$product->subcategory->sub_category_name}}</option>
					  	@php 
					  		use App\SubCategory;
					  		$all_subcategory = SubCategory::where('publication_status','=',1)->get();
					  	@endphp
					  	@foreach($all_subcategory as $subcategory)
						<option value="{{$subcategory->id}}">{{$subcategory->sub_category_name}}</option>
						@endforeach
						
					  </select>
					</div>
				  </div>

				<div class="control-group">
				  <label class="control-label" for="ProductLongDescription">Product Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="ProductLongDescription" name="product_description" rows="5">{{$product->product_description}}</textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Price</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_price" value="{{$product->product_price}}">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Size</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_size" value="{{$product->product_size}}">
				  </div>
				</div>
				@php
					if($product->priority == 1)
						$status = "High";
					else if($product->priority == 2)
						$status = "Medium";
					else
						$status = "Low";

				@endphp
				<div class="control-group">
					<label class="control-label" for="selectError3" >Select priority</label>
					<div class="controls">
					  <select id="selectError3" name="priority">
					  	<option value="{{$product->priority}}">{{$status}}</option>
						<option value="1">High</option>
						<option value="2">Medium</option>
						<option value="3">Low</option>
					  </select>
					</div>
				  </div>

				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Image</label>
				  <div class="controls">
					<input type="file" class="input-xlarge" id="ProductName" name="product_image" value="">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Color</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_color" value="{{$product->product_color}}">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="publicationStatus">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" class="input-xlarge" id="publicationStatus" name="publication_status" value="{{$product->publication_status}}">
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection