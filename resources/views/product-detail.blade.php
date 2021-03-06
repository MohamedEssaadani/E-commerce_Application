@extends('layouts.master')

@section('title')
{{$product->name}}
@endsection

@section('extra-head')
<style>
  .badge {
    display: inline-block;
    padding: .25em .4em;
    font-size: 100%;
    font-weight: 700;
    line-height: 1;
    text-align: center;
    white-space: nowrap;
    vertical-align: baseline;
    border-radius: .25rem;
  }

  .badge-danger {
    color: #fff;
    background-color: #dc3545;
  }

  .badge-warning {
    color: #000;
    background-color: #ffc107;
  }

  .badge-success {
    color: #fff;
    background-color: #28a745;
  }

</style>
@endsection

@section('content')
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
  <img src="../assets/img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
  <div class="aa-catg-head-banner-area">
    <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>{{$product->name}}</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li><a href="#">Shop</a></li>
          <li class="active">{{$product->name}}</li>
        </ol>
      </div>
    </div>
  </div>
</section>
<!-- / catg header banner section -->

<!-- product category -->
<section id="aa-product-details">
  <div class="container">
    <div class="container">
      @if(session()->has('success_message'))
      <div class="alert alert-success">
        {{session()->get('success_message')}}
      </div>
      @endif

      @if(count($errors) > 0)
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="aa-product-details-area">
          <div class="aa-product-details-content">
            <div class="row">
              <!-- Modal view slider -->
              <div class="col-md-5 col-sm-5 col-xs-12">
                <div class="aa-product-view-slider">
                  <div id="demo-1" class="simpleLens-gallery-container">
                    <div class="simpleLens-container">
                      <div class="simpleLens-big-image-container"><a
                          data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-lens-image"><img
                            src="{{productImage($product->image)}}" class="simpleLens-big-image"></a></div>
                    </div>
                    <div class="simpleLens-thumbnails-container">
                      <a data-big-image="img/view-slider/medium/polo-shirt-4.png"
                        data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper"
                        href="#">
                        <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                      </a>
                      <a data-big-image="img/view-slider/medium/polo-shirt-4.png"
                        data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper"
                        href="#">
                        <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                      </a>
                      <a data-big-image="img/view-slider/medium/polo-shirt-4.png"
                        data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper"
                        href="#">
                        <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal view content -->
              <div class="col-md-7 col-sm-7 col-xs-12">
                <div class="aa-product-view-content">
                  <h3>{{$product->name}}</h3>
                  <div class="aa-price-block">
                    <span class="aa-product-view-price">${{$product->price}} </span>
                    <div>
                      {!! $stockLevel !!}
                    </div>
                  </div>
                  <p>{{$product->slug}}</p>
                  <div class="aa-prod-quantity">
                    <form action="">
                      <select id="" name="">
                        <option selected="1" value="0">1</option>
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
                  @if ($product->quantity > 0)
                  <div class="aa-prod-view-bottom">
                    <form action="{{route('cart.store')}}" method="POST">
                      {{csrf_field()}}
                      <input type="hidden" name="id" value="{{$product->id}}">
                      <input type="hidden" name="name" value="{{$product->name}}">
                      <input type="hidden" name="price" value="{{$product->price}}">
                      <button type="submit" class="aa-add-to-cart-btn"
                        style="background:transparent; border-radius:10px;">Add To
                        Cart</button>
                    </form>
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <div class="aa-product-details-bottom">
            <ul class="nav nav-tabs" id="myTab2">
              <li><a href="#description" data-toggle="tab">Description</a></li>
              <li><a href="#review" data-toggle="tab">Reviews</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div class="tab-pane fade in active" id="description">
                <p>{!!$product->description!!}</p>
                <ul>
                  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, culpa!</li>
                  <li>Lorem ipsum dolor sit amet.</li>
                  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor qui eius esse!</li>
                  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam, modi!</li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, iusto earum voluptates autem esse
                  molestiae ipsam, atque quam amet similique ducimus aliquid voluptate perferendis, distinctio!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ea, voluptas! Aliquam facere
                  quas cumque rerum dolore impedit, dicta ducimus repellat dignissimos, fugiat, minima quaerat
                  necessitatibus? Optio adipisci ab, obcaecati, porro unde accusantium facilis repudiandae.</p>
              </div>
              <div class="tab-pane fade " id="review">
                <div class="aa-product-review-area">
                  <h4>2 Reviews for T-Shirt</h4>
                  <ul class="aa-review-nav">
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object" src="../assets/img/testimonial-img-3.jpg" alt="girl image">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                          <div class="aa-product-rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <div class="media-left">
                          <a href="#">
                            <img class="media-object" src="../assets/img/testimonial-img-3.jpg" alt="girl image">
                          </a>
                        </div>
                        <div class="media-body">
                          <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                          <div class="aa-product-rating">
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star-o"></span>
                          </div>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                  <h4>Add a review</h4>
                  <div class="aa-your-rating">
                    <p>Your Rating</p>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                    <a href="#"><span class="fa fa-star-o"></span></a>
                  </div>
                  <!-- review form -->
                  <form action="" class="aa-review-form">
                    <div class="form-group">
                      <label for="message">Your Review</label>
                      <textarea class="form-control" rows="3" id="message"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                    </div>

                    <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          @include('partials.related-products')
        </div>
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