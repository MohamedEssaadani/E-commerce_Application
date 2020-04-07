@extends('layouts.master')

@section('title')
Orders
@endsection

@section('extra-head')

@endsection

@section('content')
<!-- product category -->
<section id="aa-product-category">
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
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <div class="aa-product-catg-head">
                        <div class="aa-product-catg-head-left">
                            <h3>My Orders</h3>
                        </div>
                    </div>
                    <div class="aa-product-catg-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="cart-view-area">
                                    <div class="cart-view-table">
                                        <div class="table-responsive">
                                            <table class="table">
                                                @foreach($orders as $order)
                                                <thead style="background-color:#f3f3f3!important;">
                                                    <tr>
                                                        <th>
                                                            ORDER PLACED <br>
                                                            <span>{{$order->created_at}}</span>
                                                        </th>
                                                        <th>
                                                            ORDER ID <br>
                                                            {{$order->id}}
                                                        </th>
                                                        <th>
                                                            TOTAL <br>
                                                            ${{$order->billing_total}}
                                                        </th>
                                                        <th><a href="{{route('user.orderDetail', $order->id)}}">Order
                                                                Details</a> |
                                                            <a href="">Invoice</a></th>
                                                    </tr>
                                                </thead>
                                                @foreach($order->products as $product)
                                                <tbody>
                                                    <tr>
                                                        <td><img src="{{productImage($product->image)}}"
                                                                class="thumbnail" style="height:220px; width:200px;"
                                                                alt="">
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a>
                                                            <br>
                                                            ${{$product->price}} <br>
                                                            {{$product->qty}}
                                                        </td>

                                                    </tr>
                                                </tbody>
                                                @endforeach
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                    <div class="aa-sidebar-widget">
                        <h3>My Profile</h3>
                        <ul class="aa-catg-nav">
                            <li><a class="active" href="{{route('user.edit')}}">My Profile</a></li>
                            <li><a class="" href="{{route('user.orders')}}">My Orders</a></li>
                        </ul>
                    </div>
                </aside>
            </div>

        </div>
    </div>
</section>
<!-- / product category -->


@endsection

@section('extra-js')
@endsection