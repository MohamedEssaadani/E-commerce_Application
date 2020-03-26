@extends('layouts.master')

@section('title')
Cart
@endsection

@section('content')
<!-- Cart view section -->
<section id="cart-view">
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
    @if(Cart::count() > 0)
    <div class="row">
      <div class="col-md-12">
        <div class="cart-view-area">
          <div class="cart-view-table">
            <form action="">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Save For<br>Later</th>
                      <th></th>
                      <th></th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach(Cart::content() as $item)
                    <tr>
                      <td>
                        <form action="{{route('cart.switchToSaveForLater', $item->rowId)}}" method="POST">
                        </form>
                      </td>
                      <td>
                        <form action="{{route('cart.switchToSaveForLater', $item->rowId)}}" method="POST">
                          {{csrf_field()}}
                          <button type="submit">
                            <fa class="fa fa-save"></fa>
                          </button>
                        </form>
                      </td>
                      <td>
                        <form action="{{route('cart.remove', $item->rowId)}}" method="POST">
                          {{csrf_field()}}
                          {{method_field('DELETE')}}
                          <button type="submit" class="remove btn btn-outline-danger">
                            <fa class="fa fa-close"></fa>
                          </button>
                        </form>
                      <td><a href="{{route('shop.show', $item->model->slug)}}"><img
                            src="{{asset('storage/'.$item->model->image)}}" alt="img"></a></td>
                      <td><a class="aa-cart-title"
                          href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a></td>
                      <td>${{$item->model->price}}</td>
                      <td><input class="aa-cart-quantity quantity" type="number" value="{{$item->qty}}"
                          data-id="{{$item->rowId}}"></td>
                      <td>${{$item->subTotal()}}</td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="8" class="aa-cart-view-bottom">
                        <div class="aa-cart-coupon">
                          <input class="aa-coupon-code" type="text" placeholder="Coupon">
                          <input class="aa-cart-view-btn" type="submit" value="Apply Coupon">
                        </div>
                        <input class="aa-cart-view-btn" type="submit" value="Update Cart">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </form>
            <!-- Cart Total view -->
            <div class="cart-view-total">
              <h4>Cart Totals</h4>
              <table class="aa-totals-table">
                <tbody>
                  <tr>
                    <th>Subtotal</th>
                    <td>${{Cart::subtotal()}}</td>
                  </tr>
                  <tr>
                    <th>Taxes</th>
                    <td>${{Cart::tax()}}</td>
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td>${{Cart::total()}}</td>
                  </tr>
                </tbody>
              </table>
              <a href="{{route('checkout.index')}}" class="aa-cart-view-btn">Proced to Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->
@else
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">No Items Available In Cart!</h1>
    <p class="lead">
      <a href="{{route('shop.index')}}" class="btn btn-primary">Continue Shopping</a>
    </p>
  </div>
</div>
@endif
@if(Cart::instance('saveForLater')->count()>0)
<div class="container" style="margin-top:auto;">
  <!-- Related product -->
  <div class="aa-product-related-item">
    <h3>{{Cart::instance('saveForLater')->count()}} item(s) saved for later</h3>
    <ul class="aa-product-catg aa-related-item-slider">
      <!-- start single product item -->
      @foreach(Cart::instance('saveForLater')->content() as $item)
      <li>
        <figure>
          <a class="aa-product-img" href="{{route('shop.show', $item->model->slug)}}"><img
              src="{{asset('../assets/img/productsImages/'.$item->model->slug.'.jpg')}}" alt="polo shirt img"></a>
          <form id="my_form" action="{{route('saveForLater.switchToCart', $item->rowId)}}" method="POST">
            {{csrf_field()}}
            <a class="aa-add-card-btn" href="javascript:{}"
              onclick="document.getElementById('my_form').submit(); return false;"><span
                class="fa fa-shopping-cart"></span>Move To Cart</a>
          </form>
          <figcaption>
            <h4 class="aa-product-title"><a href="{{route('shop.show', $item->model->slug)}}">{{$item->model->name}}</a>
            </h4>
            <span class="aa-product-price">{{presentPrice($item->model->price)}}</span><span
              class="aa-product-price"><del>{{presentPrice($item->model->price*2)}}</del></span>
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
        <form action="{{route('saveForLater.destroy', $item->rowId)}}" method="POST">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <button type="submit" class="aa-badge aa-sale" style="border:none;">
            REMOVE
          </button>
        </form>
      </li>
      @endforeach
    </ul>
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
                          data-lens-image="../assets/img/view-slider/large/polo-shirt-1.png">
                          <img src="../assets/img/view-slider/medium/polo-shirt-1.png" class="simpleLens-big-image">
                        </a>
                      </div>
                    </div>
                    <div class="simpleLens-thumbnails-container">
                      <a href="#" class="simpleLens-thumbnail-wrapper"
                        data-lens-image="../assets/img/view-slider/large/polo-shirt-1.png"
                        data-big-image="../assets/img/view-slider/medium/polo-shirt-1.png">
                        <img src="../assets/img/view-slider/thumbnail/polo-shirt-1.png">
                      </a>
                      <a href="#" class="simpleLens-thumbnail-wrapper"
                        data-lens-image="../assets/img/view-slider/large/polo-shirt-1.png"
                        data-big-image="../assets/img/view-slider/medium/polo-shirt-1.png">
                        <img src="../assets/img/view-slider/thumbnail/polo-shirt-1.png">
                      </a>

                      <a href="#" class="simpleLens-thumbnail-wrapper"
                        data-lens-image="../assets/img/view-slider/large/polo-shirt-4.png"
                        data-big-image="../assets/img/view-slider/medium/polo-shirt-4.png">
                        <img src="../assets/img/view-slider/thumbnail/polo-shirt-4.png">
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
  @else
  <h3 class="display-4">You have no items saved for later</h3>
  @endif
</div>
@endsection

@section('extra-js')
<script src="{{ asset('js/app.js') }}"></script>
<script>
  (function() {
    const className = document.querySelectorAll('.quantity')

    Array.from(className).forEach(function(element) {
      element.addEventListener('change', function() {
        const id = element.getAttribute('data-id');
        axios.patch(`/cart/${id}`, {
            quantity:  this.value,
          })
          .then(function(response) {
            //console.log(response);
            window.location.href = '{{ route('cart.index') }}'
          })
          .catch(function(error) {
            console.log(error);
            window.location.href = '{{ route('cart.index') }}'
          });
      })
    })
  })();
</script>
@endsection