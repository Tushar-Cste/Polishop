@extends('frontend_layout')

@section('categoryProduct')
	@include('sidebar')
@endsection


@section('content')




 @php 
	$subcategory = 'App\SubCategory'::find($id);
@endphp
	<div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="">{{$subcategory->category->category_name}}</a> </div>
        <!--Breadcrumb Part End-->
        <h1>{{$subcategory->category->category_name}}</h1>
        <div class="product-filter">
          <div class="display"><b>Display:</b> <span class="grid1-icon">Grid</span> <a href="category-list.html" class="list-icon">List</a></div>
          <div class="limit"><b>Show:</b>
            <select>
              <option value="15" selected="selected">15</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
          <form method="post" action="{{URL::to('/sortProduct/'.$id)}}" id="myForm">
          {{csrf_field()}}
          <div class="sort"><b>Sort By:</b>
            <input type="hidden" value="{{$id}}" name="id">
            <select onChange=selectChange(this.value) name="sort">
              <option value="" selected="selected">Default</option>
              <option value="1" >Name (A - Z)</option>
              <option value="2" >Name (Z - A)</option>
              <option value="3" >Price (Low &gt; High)</option>
              <option value="4" >Price (High &gt; Low)</option>
              
            </select>
          </div>
        </div>
        </form>
        <div class="product-compare"><a href="#" id="compare-total">Product Compare (0)</a></div>
        <!--Product Grid Start-->
        
        <script>
function selectChange(val) {
    //Set the value of action in action attribute of form element.
    //Submit the form
    $('#myForm').submit();
}
</script>
          
          
         
          
          
          <div class="product-grid">
          <!-- <div>
            <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-162x162.jpg" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;"></a></div>
            <div class="name"><a href="product.html">Apple Cinema 30"</a></div>
            <div class="description">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed speci..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> <br>
              <span class="price-tax">Ex Tax: $90.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button">
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews."></div>
          </div> -->

          
           @foreach($allProducts as $product)
           <div>
            <div class="image"><a href="product.html"><img src="/storage/product_images/{{$product->product_image}}" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;"></a></div>
            <div class="name"><a href="product.html">{{$product->product_name}}</a></div>
            <div class="description">{{$product->product_description}}</div>
            <div class="price"> <span class="price-old">{{"".($product->product_price - 5)}}</span> <span class="price-new">{{$product->product_price}}</span> <br></div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button">
            </div>
            <div class="rating"><img src="/asset/image/stars-4.png" alt="Based on 1 reviews."></div>
          </div>
         @endforeach
         
          <?php echo $allProducts->render(); ?>
        </div> 
        
          
          
          
          
        
        <!--Product Grid End-->
        <!--Pagination Part Start-->
        
        <!--Pagination Part End-->
      </div>

@endsection

<!-- 
        <div class="product-grid">
        
         
          </div>
           

           <div class="pagination">
          <div class="links"> <b>1</b> <a href="#">2</a> <a href="#">&gt;</a> <a href="#">&gt;|</a></div>
          <div class="results">Showing 1 to 15 of 16 (2 Pages)</div>
        </div> -->