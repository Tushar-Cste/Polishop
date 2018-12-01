<div id="column-left">
        <!--Category Start -->
        <div class="box">
          <div class="box-heading">Categories</div>
          <div class="box-content box-category">
            <ul id="cat_accordion">
            <!-- for subcategory -->
            @php 
            	$allcategory = 'App\Category'::get();
            	$subcategory = 'App\SubCategory'::find($id);
            	$id2 = $subcategory->category_id;
            @endphp
            @foreach($allcategory as $category)
             @if($category->id == $id2)
              <li class="custom_id20 cutom-parent-li"><a class="active cutom-parent" href="">{{$category->category_name}}<span class="dcjq-icon"></span></a> <span class="down"></span>
                <ul style="display: block;">
              @else
              <li class=" cutom-parent-li"><a class=" cutom-parent" href="" >{{$category->category_name}}<span class="dcjq-icon"></span></a> <span class="down"></span>
                <ul style="display: none;">
              @endif
              @foreach($category->subCategory as $subcategory)
                <li class="custom_id26"><a class="" href="{{URL::to('/subcategoryProduct/'.$subcategory->id)}}">{{$subcategory->sub_category_name}}</a></li>
               @endforeach
              </ul>
            </li>
            @endforeach
              <!-- for category -->
            </ul>
          </div>
        </div>
        <script type="text/javascript" src="{{URL::to('asset/js/jquery.dcjqaccordion.js')}}"></script>
        <!--Category End -->
        <!--Refine Search Start-->
        <div class="box">
          <div class="box-heading">Refine Search</div>
          <div class="box-content">
          <form  action="{{url('/rangeProduct/'.$id)}}" method="post" >
          {{csrf_field()}}
            <ul class="box-filter">
              <li><span id="filter-group">Price</span>
                <ul>
                  <li>
                    <input type="checkbox" value="1" id="filter3" name = "priceRanger">
                    <label for="filter3">$0 - $100 (1)</label>
                  </li>
                  <li>
                    <input type="checkbox" value="2" id="filter4" name = "priceRanger">
                    <label for="filter4">$100 - $500 (5)</label>
                  </li>
                  <li>
                    <input type="checkbox" value="3" id="filter5" name = "priceRanger">
                    <label for="filter5">$500 - $1000 (1)</label>
                  </li>
                  <li>
                    <input type="checkbox" value="5" id="filter6" name = "priceRanger">
                    <label for="filter6">$1000 - $1500 (0)</label>
                  </li>
                </ul>
              </li>
            </ul>
            <!-- <a id="button-filter" class="button" type="submit">Refine Search</a>  -->
            <input type="submit" class="button" value="refine search">
            </form>
            </div>

        </div>
        <!--Refine Search End-->
        <!--Latest Product Start-->
        <div class="box">
          <div class="box-heading">Latest</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry"></a></div>
                      <div class="name"><a href="product.html">Friendly Jewelry</a></div>
                      <div class="price">$1,177.00</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-45x45.jpg" alt="Apple Cinema 30&quot;"></a></div>
                      <div class="name"><a href="product.html">Apple Cinema 30"</a></div>
                      <div class="price"><span class="price-old">$119.50</span> <span class="price-new">$107.75</span></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_classic_1-45x45.jpg" alt="iPad Classic"></a></div>
                      <div class="name"><a href="product.html">iPad Classic</a></div>
                      <div class="price">$119.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/lotto-sports-shoes-white-45x45.jpg" alt="Lotto Sports Shoes"></a></div>
                      <div class="name"><a href="product.html">Lotto Sports Shoes</a></div>
                      <div class="price">$589.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-45x45.jpg" alt="Jeep-Casual-Shoes"></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price">$131.25</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--Latest Product End-->
        <!--Banner Start-->
        <div class="banner">
          <div><a href="#"><img src="image/product/small-banner1-220x350.jpg" alt="banner" title="banner"></a></div>
        </div>
        <!--Banner End-->
      </div>