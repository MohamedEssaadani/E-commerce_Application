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
          @foreach ($slides as $slide )
          <li>
            <div class="seq-model">
              <img data-seq src="{{asset('storage/'.$slide->image)}}" alt="Men slide img" />
            </div>
            <div class="seq-title">
              <span data-seq>Save Up to 75% Off</span>
              <h2 data-seq>{{$slide->title}}</h2>
              <p data-seq>{{$slide->subtitle}}</p>
              <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
            </div>
          </li>
          @endforeach
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
<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <h2 style="text-align:center; margin:40px;">Featured Products</h2>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- featured Products-->
                <div class="tab-pane fade in active" id="men">
                  <ul class="aa-product-catg">
                    <!-- start single product item -->
                    @foreach ($products as $product )
                    <li>
                      <figure>
                        <a class="aa-product-img" href="#"><img src="{{asset('storage/'.$product->image)}}"
                            alt="polo shirt img"></a>
                        <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$product->name}}</a></h4>
                          <span class="aa-product-price">${{$product->price}}</span><span
                            class="aa-product-price"><del>${{$product->price*2}}</del></span>
                        </figcaption>
                      </figure>

                      <!-- product badge -->
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                    </li>
                    @endforeach
                  </ul>
                  <a class="aa-browse-btn" href="{{route('shop.index')}}">Browse all Product <span
                      class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured Products -->


              </div>
              <!-- quick view modal -->
              <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-body">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <div class="row">
                        <!-- Modal view slider -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-slider">
                            <div class="simpleLens-gallery-container" id="demo-1">
                              <div class="simpleLens-container">
                                <div class="simpleLens-big-image-container">
                                  <a class="simpleLens-lens-image"
                                    data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                    <img src="img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                  </a>
                                </div>
                              </div>
                              <div class="simpleLens-thumbnails-container">
                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                  data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                  data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                  <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                </a>
                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                  data-lens-image="img/view-slider/large/polo-shirt-3.png"
                                  data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                  <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                                </a>

                                <a href="#" class="simpleLens-thumbnail-wrapper"
                                  data-lens-image="img/view-slider/large/polo-shirt-4.png"
                                  data-big-image="img/view-slider/medium/polo-shirt-4.png">
                                  <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Modal view content -->
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div class="aa-product-view-content">
                            <h3>T-Shirt</h3>
                            <div class="aa-price-block">
                              <span class="aa-product-view-price">$34.99</span>
                              <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae
                              repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                            <h4>Size</h4>
                            <div class="aa-prod-view-size">
                              <a href="#">S</a>
                              <a href="#">M</a>
                              <a href="#">L</a>
                              <a href="#">XL</a>
                            </div>
                            <div class="aa-prod-quantity">
                              <form action="">
                                <select name="" id="">
                                  <option value="0" selected="1">1</option>
                                  <option value="1">2</option>
                                  <option value="2">3</option>
                                  <option value="3">4</option>
                                  <option value="4">5</option>
                                  <option value="5">6</option>
                                </select>
                              </form>
                              <p class="aa-prod-category">
                                Category: <a href="#">Polo T-Shirt</a>
                              </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                              <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To
                                Cart</a>
                              <a href="#" class="aa-add-to-cart-btn">View Details</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- / quick view modal -->
            </div>
          </div>
        </div>
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
              <P>We Provide FREE SHIPPING for the worldwide.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-clock-o"></span>
              <h4>30 DAYS MONEY BACK</h4>
              <P>If you make a refund or you didn't receive your product you will get your money back before 30 DAYS.
              </P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-phone"></span>
              <h4>SUPPORT 24/7</h4>
              <P>We are available 24H/7Days for you.</P>
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
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2020</span>
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
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2020</span>
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
                    <span href="#"><i class="fa fa-clock-o"></i>June 26, 2020</span>
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
          <p>We don't send any spams!</p>
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