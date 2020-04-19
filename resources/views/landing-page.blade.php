@extends('layouts.master')

@section('title')
Home
@endsection

@section('content')
<!-- Start slider -->
<section id="aa-slider">
  <div class="aa-slider-area">
    <div id="sequence" class="seq">
      <div class="seq-screen">
        <ul class="seq-canvas">
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img data-seq src="../assets/img/slider/1.jpg" alt="Men slide img" />
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 75% Off</span>
              <h2 data-seq>Men Collection</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img data-seq src="../assets/img/slider/2.jpg" alt="Wristwatch slide img" />
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 40% Off</span>
              <h2 data-seq>Wristwatch Collection</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img data-seq src="../assets/img/slider/3.jpg" alt="Women Jeans slide img" />
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 75% Off</span>
              <h2 data-seq>Jeans Collection</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img data-seq src="../assets/img/slider/4.jpg" alt="Shoes slide img" />
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 75% Off</span>
              <h2 data-seq>Exclusive Shoes</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
          <!-- single slide item -->
          <li>
            <div class="seq-model">
              <img data-seq src="../assets/img/slider/5.jpg" alt="Male Female slide img" />
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 50% Off</span>
              <h2 data-seq>Best Collection</h2>
              <p data-seq>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus, illum.</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
        </ul>
      </div>
      <!-- slider navigation btn -->
      <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
        <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
        <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
      </fieldset>
    </div>
  </div>
</section>
<!--Slides-->
<!-- Products section -->
<section id="aa-product" style="margin-top:40px;">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">

              <!-- Tab panes -->
              <div class="tab-content">
                <!-- start men product category -->
                <div class="tab-pane fade in active" id="men">
                  <h2>Feautered Products</h2>
                  <ul class="aa-product-catg">
                    <!-- start single product item -->
                    @foreach($products as $product)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{route('shop.show', $product->slug)}}"><img
                            src="{{asset('storage/'.$product->image)}}"></a>
                        <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a
                              href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a></h4>
                          <span class="aa-product-price">${{$product->price}}</span><span
                            class="aa-product-price"><del>${{$product->price*2}}</del></span>
                        </figcaption>
                      </figure>
                      <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span
                            class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span
                            class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal"
                          data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                      </div>
                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    @endforeach
                    <!-- / men product category -->
                  </ul>
                  <a class="aa-browse-btn" href="{{route('shop.index')}}">Browse all Product <span
                      class="fa fa-long-arrow-right"></span></a>
                </div>
              </div>


            </div>
</section>
<!-- / Products section -->

<!-- Support section -->
<section id="aa-support">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-support-area">
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-truck"></span>
              <h4>FREE SHIPPING</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-clock-o"></span>
              <h4>30 DAYS MONEY BACK</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-phone"></span>
              <h4>SUPPORT 24/7</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Support section -->

<!-- Latest Blog -->
<section id="aa-latest-blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-latest-blog-area">
          <h2>LATEST BLOG</h2>
          <div class="row">
            <!-- single latest blog -->
            <div class="col-md-4 col-sm-4">
              <div class="aa-latest-blog-single">
                <figure class="aa-blog-img">
                  <a href="#"><img src="../assets/img/promo-banner-1.jpg" alt="img"></a>
                  <figcaption class="aa-blog-img-caption">
                    <span href="#"><i class="fa fa-eye"></i>5K</span>
                    <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                    <a href="#"><i class="fa fa-comment-o"></i>20</a>
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                  </figcaption>
                </figure>
                <div class="aa-blog-info">
                  <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi
                    aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit
                    incidunt, voluptates corporis.</p>
                  <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                </div>
              </div>
            </div>
            <!-- single latest blog -->
            <div class="col-md-4 col-sm-4">
              <div class="aa-latest-blog-single">
                <figure class="aa-blog-img">
                  <a href="#"><img src="../assets/img/promo-banner-3.jpg" alt="img"></a>
                  <figcaption class="aa-blog-img-caption">
                    <span href="#"><i class="fa fa-eye"></i>5K</span>
                    <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                    <a href="#"><i class="fa fa-comment-o"></i>20</a>
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                  </figcaption>
                </figure>
                <div class="aa-blog-info">
                  <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi
                    aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit
                    incidunt, voluptates corporis.</p>
                  <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                </div>
              </div>
            </div>
            <!-- single latest blog -->
            <div class="col-md-4 col-sm-4">
              <div class="aa-latest-blog-single">
                <figure class="aa-blog-img">
                  <a href="#"><img src="../assets/img/promo-banner-1.jpg" alt="img"></a>
                  <figcaption class="aa-blog-img-caption">
                    <span href="#"><i class="fa fa-eye"></i>5K</span>
                    <a href="#"><i class="fa fa-thumbs-o-up"></i>426</a>
                    <a href="#"><i class="fa fa-comment-o"></i>20</a>
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2016</span>
                  </figcaption>
                </figure>
                <div class="aa-blog-info">
                  <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, ad? Autem quos natus nisi
                    aperiam, beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit
                    incidunt, voluptates corporis.</p>
                  <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Latest Blog -->



<!-- Subscribe section -->
<section id="aa-subscribe">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-subscribe-area">
          <h3>Subscribe our newsletter </h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
          <form action="" class="aa-subscribe-form">
            <input type="email" name="" id="" placeholder="Enter your Email">
            <input type="submit" value="Subscribe">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Subscribe section -->
@endsection