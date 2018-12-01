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
		<a href="#">Edit Sub-Category</a>
	</li>
</ul>

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Sub-Category</h2>
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
			<form class="form-horizontal" action="{{url('/updateSubCategory/'.$subcategory->id)}}" method="post">
			{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="CategoryName">Sub-Category Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="CategoryName" name="sub_category_name" value="{{$subcategory->sub_category_name}}">
				  </div>
				</div>

				<div class="control-group">
					<label class="control-label" for="selectError3" >Select Category</label>
					<div class="controls">
					  <select id="selectError3" name="category_id">
					  	<option value="{{$subcategory->category->id}}">{{$subcategory->category->category_name}}</option>
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
				  <label class="control-label" for="CategoryDescription">Sub-Category Description</label>
				  <div class="controls">
					<textarea class="cleditor" id="CategoryDescription" name="sub_category_description" rows="10">{{$subcategory->sub_category_description}}</textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="publicationStatus">Publication Status</label>
				  <div class="controls">
					<input type="checkbox" class="input-xlarge" id="publicationStatus" name="publication_status" value="1">
				  </div>
				</div>
				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update Sub-Category</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->


@endsection