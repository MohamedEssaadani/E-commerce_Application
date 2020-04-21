@extends('layouts.master')

@section('title')
Thank You
@endsection

@section('extra-head')
@endsection

@section('content')
<!-- 404 error section -->
<section id="aa-error" style="margin-bottom:40px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-error-area">
                    <h2>Thank you</h2>
                    <span>Your order has been placed successfully!</span>
                    <p>Sorry this content has been moved Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Earum, amet perferendis, nemo facere excepturi quis.</p>
                    <a href="{{route('shop.index')}}"> Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- / 404 error section -->
@endsection

@section('extra-js')
@endsection