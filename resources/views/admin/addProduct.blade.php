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
		<a href="#">Add Product</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
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
			<form class="form-horizontal" enctype="multipart/form-data" action="{{url('/storeProduct')}}" method="post">
			{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_name">
				  </div>
				</div>
				<div class="control-group">
					<label class="control-label" for="selectError3" >Select Category</label>
					<div class="controls">
					  <select id="selectError3" name="category_id">
					  	<option>select category</option>
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
					  	<option>select sub-category</option>
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
					<textarea class="cleditor" id="ProductLongDescription" name="product_description" rows="5"></textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Price</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_price">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Size</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_size">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Image</label>
				  <div class="controls">
					<input type="file" class="input-xlarge" id="ProductName" name="product_image">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="ProductName">Product Color</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="ProductName" name="product_color">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="publicationStatus">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" class="input-xlarge" id="publicationStatus" name="publication_status" value="1">
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Add Product</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection


