@extends('frontend_layout')
@section('content')
 <div id="container">
      <div id="content">
        <!-- Nivo Slider Start -->
        <section class="slider-wrapper">
          <div id="slideshow" class="nivoSlider"> <a class="nivo-imageLink" href="http://themeforest.net/item/polishop-responsive-ecommerce-html-template/4410285?ref=harnishdesign"><img src="{{URL::to('asset/image/slider/slide-1.jpg')}}" alt="slide-1" /></a> <a class="nivo-imageLink" href="http://themeforest.net/item/polishop-responsive-ecommerce-html-template/4410285?ref=harnishdesign"><img src="{{URL::to('asset/image/slider/slide-2.jpg')}}" alt="slide-2" /></a> <a class="nivo-imageLink" href="http://themeforest.net/item/polishop-responsive-ecommerce-html-template/4410285?ref=harnishdesign"><img src="{{URL::to('asset/image/slider/slide-3.jpg')}}" alt="slide-3" /></a> </div>
        </section>
        <script type="text/javascript"><!--
$(document).ready(function() {
  $('#slideshow').nivoSlider();
});
--></script>
        <!-- Nivo Slider End-->
        <!-- Welcom Text Start-->
        <div class="welcome">Welcome to Polishop</div>
        <p><strong>Polishop</strong> Premium Responsive HTML Template. Polishop is a clean and Fully Responsive to use the template for every kind of eCommerce online shop. Great Looks on Desktops, Tablets and Mobiles. Well Documented. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, <a href="#">BUY THEME</a>.</p>
        <!-- Welcom Text End-->
        <!-- Featured Product Start-->
        <section class="box">
          <div class="box-heading">Featured</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider featured_carousel">
                <ul class="slides">
                @foreach($allproducts as $product)
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="{{URL::to('/storage/product_images/'.$product->product_image)}}" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="http://localhost/polishop/index.php?route=product/product&amp;product_id=43">{{$product->product_name}}</a></div>
                      <div class="price"> {{$product->product_price}} </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </section>
        <script type="text/javascript">
(function() {
  // store the slider in a local variable
  var $window = $(window),
      flexslider;
 
  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 320) ? 1 :
       (window.innerWidth < 600) ? 2 :
       (window.innerWidth < 800) ? 3 :
           (window.innerWidth < 900) ? 4 : 5;
  }
  $window.load(function() {
    $('#content .featured_carousel').flexslider({
      animation: "slide",
      animationLoop: false,
    slideshow: false,
      itemWidth: 210,
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize() // use function to pull in initial value
    });
  });
}());
</script>
        <!-- Featured Product End-->
        <!-- Product Tab Start-->
        <section id="product-tab" class="product-tab">
          <ul id="tabs" class="tabs">
            <li><a href="#tab-latest">Latest</a></li>
            <li><a href="#tab-bestseller">Bestseller</a></li>
            <li><a href="#tab-special">Special</a></li>
          </ul>
          <div id="tab-latest" class="tab_content">
            <div class="box-product">
              <div class="flexslider latest_carousel_tab">
                <ul class="slides">
                @php
                  $allproducts = App\Product::orderBy('created_at','DESC')->limit('5')->get();
                @endphp
                @foreach($allproducts as $product)
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="/storage/product_images/{{$product->product_image}}" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="http://localhost/polishop/index.php?route=product/product&amp;product_id=43">{{$product->product_name}}</a></div>
                      <div class="price"> {{$product->product_price}} </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div id="tab-bestseller" class="tab_content">
            <div class="box-product">
              <div class="flexslider bestseller_carousel_tab">
                <ul class="slides">
                  @php
                  $allproducts = App\Product::orderBy('no_of_sold','ASC')->limit('8')->get();
                @endphp
                @foreach($allproducts as $product)
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="/storage/product_images/{{$product->product_image}}" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="http://localhost/polishop/index.php?route=product/product&amp;product_id=43">{{$product->product_name}}</a></div>
                      <div class="price"> {{$product->product_price}} </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div id="tab-special" class="tab_content">
            <div class="box-product">
              <div class="flexslider special_carousel_tab">
                <ul class="slides">
                  @php
                  $allproducts = App\Product::orderBy('priority','ASC')->limit('8')->get();
                @endphp
                @foreach($allproducts as $product)
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="/storage/product_images/{{$product->product_image}}" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="http://localhost/polishop/index.php?route=product/product&amp;product_id=43">{{$product->product_name}}</a></div>
                      <div class="price"> {{$product->product_price}} </div>
                      <div class="cart">
                        <input type="button" value="Add to Cart" class="button" />
                      </div>
                      <div class="clear"></div>
                    </div>
                  </li>
                @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
        </section>
        <script type="text/javascript">
(function() {
  // store the slider in a local variable
  var $window = $(window),
      flexslider;
  // tiny helper function to add breakpoints
  function getGridSize() {
    return (window.innerWidth < 320) ? 1 :
       (window.innerWidth < 600) ? 2 :
       (window.innerWidth < 800) ? 3 :
           (window.innerWidth < 900) ? 4 : 5;
  }
  $window.load(function() {
    $('#product-tab .featured_carousel_tab, #product-tab .latest_carousel_tab, #product-tab .bestseller_carousel_tab, #product-tab .special_carousel_tab').flexslider({
      animation: "slide",
      animationLoop: false,
    slideshow: false,
      itemWidth: 210,
      minItems: getGridSize(), // use function to pull in initial value
      maxItems: getGridSize(), // use function to pull in initial value
    start: function(){
      $("#product-tab .tab_content").addClass("deactive");
      $("#product-tab .tab_content:first").removeClass("deactive"); //Show first tab content
      } });
  });

$(document).ready(function() {
    //Default Action
    $("ul#tabs li:first").addClass("active").show(); //Activate first tab
    //On Click Event
    $("ul#tabs li").click(function() {
        $("ul#tabs li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
    $("#product-tab .tab_content").hide(); 
        var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active content
        return false;
    });
});}());
</script>
        <!-- Product Tab End-->
        <!-- Carousel Start-->
        <section id="carousel">
          <ul class="jcarousel-skin-opencart">
          @foreach($allbrand as $brand)
            <li><a href="#"><img src="{{URL::to('storage/brand_logos/'.$brand->brand_logo)}}" alt="brand_logo" title="brand_logo" /></a></li>
          @endforeach
          </ul>
        </section>
        <!-- Carousel End-->
      


 
  @endsection