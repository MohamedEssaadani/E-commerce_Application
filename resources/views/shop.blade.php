@extends('layouts.master')

@section('title')
Products
@endsection

@section('content')
<!-- product category -->
<section id="aa-product-category">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
        <div class="aa-product-catg-content">
          <div class="aa-product-catg-head">
            <div class="aa-product-catg-head-left">
              <form action="" class="aa-sort-form">
                <label for="">Sort by</label>
                <select name="">
                  <option value="1" selected="Default">Default</option>
                  <option value="2">Name</option>
                  <option value="3">Price</option>
                  <option value="4">Date</option>
                </select>
              </form>
              <form action="" class="aa-show-form">
                <label for="">Show</label>
                <select name="">
                  <option value="1" selected="12">12</option>
                  <option value="2">24</option>
                  <option value="3">36</option>
                </select>
              </form>
              <strong style="margin-left:20px;">Filter: </strong>
              <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'  ])}}" onMouseOver="this.style.color='#8a2be2'" onMouseOut="this.style.color='#333333'">Low To High</a>|
              <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'  ])}}" onMouseOver="this.style.color='#8a2be2'" onMouseOut="this.style.color='#333333'">High To Low</a>
            </div>
            <div class="aa-product-catg-head-right">
              <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
              <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
            </div>
          </div>
          <div class="aa-product-catg-body">
            <ul class="aa-product-catg">
              <!-- start single product item -->
              @forelse($products as $product)
              <li>
                <figure>
                  <a class="aa-product-img" href="{{route('shop.show', $product->slug)}}"><img src="{{productImage($product->image)}}" alt="polo shirt img"></a>
                  <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                  <figcaption>
                    <h4 class="aa-product-title"><a href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a></h4>
                    <span class="aa-product-price"><?php echo '$' . $product->price ?></span><span class="aa-product-price"><del><?php echo $product->price * 2 ?></del></span>
                    <p class="aa-product-descrip">{{$product->description}}</p>
                  </figcaption>
                </figure>
                <div class="aa-product-hvr-content">
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                  <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                  <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>
                </div>
                <!-- product badge -->
                <span class="aa-badge aa-sale" href="#">SALE!</span>
              </li>
              @empty
              <div class="container" style="margin-left:20px;">
                <h3>No Items Found!!</h3>
              </div>
              @endforelse
            </ul>
            <!-- quick view modal -->
            <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                <a class="simpleLens-lens-image" data-lens-image="img/view-slider/large/polo-shirt-1.png">
                                  <img src="../assets/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                                </a>
                              </div>
                            </div>
                            <div class="simpleLens-thumbnails-container">
                              <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-1.png" data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                              </a>
                              <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-3.png" data-big-image="img/view-slider/medium/polo-shirt-3.png">
                                <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                              </a>

                              <a href="#" class="simpleLens-thumbnail-wrapper" data-lens-image="img/view-slider/large/polo-shirt-4.png" data-big-image="img/view-slider/medium/polo-shirt-4.png">
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
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
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
                            <a href="#" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <a href="#" class="aa-add-to-cart-btn">View Details</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div>
            <!-- / quick view modal -->
          </div>

          <div>
             {{$products->appends(request()->input())->links()}}
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
        <aside class="aa-sidebar">
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Category</h3>
            <ul class="aa-catg-nav">
              @foreach($categories as $category)
              <li><a class="{{request()->category == $category->slug ? 'active' : ''}}" href="{{route('shop.index', ['category' => $category->slug])}}">{{$category->name}}</a></li>
              @endforeach
            </ul>
          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Tags</h3>
            <div class="tag-cloud">
              <a href="#">Fashion</a>
              <a href="#">Ecommerce</a>
              <a href="#">Shop</a>
              <a href="#">Hand Bag</a>
              <a href="#">Laptop</a>
              <a href="#">Head Phone</a>
              <a href="#">Pen Drive</a>
            </div>
          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Shop By Price</h3>
            <!-- price range -->
            <div class="aa-sidebar-price-range">
              <form action="">
                <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                </div>
                <span id="skip-value-lower" class="example-val">30.00</span>
                <span id="skip-value-upper" class="example-val">100.00</span>
                <a href="" class="btn btn-secondary" style="color:white; background:#8a2be2;">Click me</a>
              </form>
            </div>

          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Shop By Color</h3>
            <div class="aa-color-tag">
              <a class="aa-color-green" href="#"></a>
              <a class="aa-color-yellow" href="#"></a>
              <a class="aa-color-pink" href="#"></a>
              <a class="aa-color-purple" href="#"></a>
              <a class="aa-color-blue" href="#"></a>
              <a class="aa-color-orange" href="#"></a>
              <a class="aa-color-gray" href="#"></a>
              <a class="aa-color-black" href="#"></a>
              <a class="aa-color-white" href="#"></a>
              <a class="aa-color-cyan" href="#"></a>
              <a class="aa-color-olive" href="#"></a>
              <a class="aa-color-orchid" href="#"></a>
            </div>
          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Recently Views</h3>
            <div class="aa-recently-views">
              <ul>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="../assets/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="../assets/img/woman-small-1.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="../assets/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- single sidebar -->
          <div class="aa-sidebar-widget">
            <h3>Top Rated Products</h3>
            <div class="aa-recently-views">
              <ul>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="../assets/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="../assets/img/woman-small-1.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
                <li>
                  <a href="#" class="aa-cartbox-img"><img alt="img" src="../assets/img/woman-small-2.jpg"></a>
                  <div class="aa-cartbox-info">
                    <h4><a href="#">Product Name</a></h4>
                    <p>1 x $250</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </aside>
      </div>

    </div>
  </div>
</section>
<!-- / product category -->


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