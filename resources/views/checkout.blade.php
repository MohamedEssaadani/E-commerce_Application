@extends('layouts.master')

@section('title')
Checkout
@endsection

@section('extra-head')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<!-- Cart view section -->
<section id="checkout">
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
        <li>{!! $error !!}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <div class="row">
      <div class="col-md-12">
        <div class="checkout-area">
          <form action="{{route('checkout.store')}}" method="POST" id="payment-form">
            {{csrf_field()}}
            <div class="row">
              <div class="col-md-8">
                <div class="checkout-left">
                  <div class="panel-group" id="accordion">
                    <!-- Coupon section -->
                    <div class="panel panel-default aa-checkout-coupon">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            Have a Coupon?
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse ">
                        <div class="panel-body">
                          <form action="{{route('coupon.store')}}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" placeholder="Coupon Code" class="aa-coupon-code">
                            <input type="submit" value="Apply Coupon" class="aa-browse-btn">
                          </form>
                        </div>
                      </div>
                    </div>
                    <!-- Billing Details -->
                    <div class="panel panel-default aa-checkout-billaddress">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                            Billing Details
                          </a>
                        </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" id="name" name="name" placeholder="Full Name*"
                                  value="{{old('name')}}" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                @if (auth()->user())
                                <input type="email" id="email" name="email" placeholder="Email Address*"
                                  value="{{auth()->user()->email}}" readonly>
                                @else
                                <input type="email" id="email" name="email" placeholder="Email Address*"
                                  value="{{old('email')}}" required>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="tel" placeholder="Phone*" id="phone" name="phone" value="{{old('phone')}}">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <textarea id="address" name="address" value="{{old('address')}}" cols="8" rows="3"
                                  required>Address*</textarea>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" placeholder="Appartment, Suite etc.">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="city" id="city" placeholder="City / Town*" required>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="province" placeholder="Province*">
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="aa-checkout-single-bill">
                                <input type="text" name="postalcode" placeholder="Postcode / ZIP*">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="aa-checkout-single-bill">
                                <input type="text" id="name_on_card" name="name_on_card" placeholder="Name On Card*"
                                  value="{{old('name_on_card')}}" required>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <label for="card-element">
                                Credit or debit card
                              </label>
                              <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                              </div>

                              <!-- Used to display form errors. -->
                              <div id="card-errors" role="alert"></div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="checkout-right">
                  <h4>Order Summary</h4>
                  <div class="aa-order-summary-area">
                    <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Product</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach(Cart::content() as $item)
                        <tr>
                          <td>{{$item->model->name}} <strong> x 1</strong></td>
                          <td>{{$item->model->price}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>Subtotal</th>
                          <td>${{Cart::subtotal()}}</td>
                        </tr>
                        <tr>
                          <th>Tax</th>
                          <td>${{Cart::tax()}}</td>
                        </tr>
                        <tr>
                          <th>Total</th>
                          <td>${{Cart::total()}}</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <h4>Payment Method</h4>
                  <div class="aa-payment-method">
                    <label for="creditcard"><input type="radio" id="creditcard" name="optionsRadios" checked> Credit
                      Card </label>
                    <label for="paypal"><input type="radio" id="paypal" name="optionsRadios"> Via Paypal </label>
                    <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0"
                      alt="PayPal Acceptance Mark">
                    <input type="submit" id="submit-order" value="Place Order" class="aa-browse-btn">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Cart view section -->
@endsection

@section('extra-js')
<script>
  (function() {

    // Create a Stripe client.
    var stripe = Stripe('pk_test_Z1Lok7G4QSCFIqcHmvHFZyhs00CWrCEym9');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
      base: {
        color: '#32325d',
        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
        fontSmoothing: 'antialiased',
        fontSize: '16px',
        '::placeholder': {
          color: '#aab7c4'
        }
      },
      invalid: {
        color: '#fa755a',
        iconColor: '#fa755a'
      }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
      style: style,
      hidePostalCode: true
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');


    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
      var displayError = document.getElementById('card-errors');
      if (event.error) {
        displayError.textContent = event.error.message;
      } else {
        displayError.textContent = '';
      }
    });


    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
      event.preventDefault();

      //disable submit button to prevent repeated clicks
      document.getElementById('submit-order').disable = true;

      stripe.createToken(card).then(function(result) {
        if (result.error) {
          // Inform the user if there was an error.
          var errorElement = document.getElementById('card-errors');
          errorElement.textContent = result.error.message;
          document.getElementById('submit-order').disable = false;

        } else {
          // Send the token to your server.
          stripeTokenHandler(result.token);
        }
      });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // Submit the form
      form.submit();
    }
  })();
</script>
@endsection