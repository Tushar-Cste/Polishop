@extends('frontend_layout')
@section('content')

<div id="container">
      <!--Left Part-->
      <div id="column-left">
        <div class="box">
          <div class="box-heading">Information</div>
          <div class="box-content">
            <ul class="list-item">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Delivery Information</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms &amp; Conditions</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="sitemap.html">Site Map</a></li>
            </ul>
          </div>
        </div>
        <!--Bestsellers Part Start-->
        <div class="box">
          <div class="box-heading">Bestsellers</div>
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
        <!--Bestsellers Part End-->
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index.html">Home</a> » <a href="contact-us.html">Contact Us</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Contact Us</h1>
        <h2>Our Location</h2>
        <div class="contact-info">
          <div class="content">
            <div class="left">
              <h4><b>Address:</b></h4>
              <p>Central Square, 22 Hoi Wing Road, Tuen Mun, New Delhi,<br>
                India. 3800004</p>
            </div>
            <div class="right">
              <h4><b>Telephone:</b></h4>
              +91 9898989898<br>
              +91 8787878787 <br>
            </div>
          </div>
        </div>
        
        <h2>Contact Form</h2>
        <form action="/contact" method="post">
        {{csrf_field()}}
        <div class="content"> <b>Subject:</b><br>
          <input class="large-field" type="text" value="test" name="subject">
          <br>
          <br>
          <b>E-Mail Address:</b><br>
          <input class="large-field" type="email" value="test@test.com" name="email">
          <br>
          <br>
          <b>Message:</b><br>
          <textarea style="width: 98%;" rows="10" cols="40" name="message"></textarea>
        </div>
        <div class="buttons">
          <div class="right">
            <input type="submit" class="button" value="Send">
          </div>
        </div>
        </form> 
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
@endsection