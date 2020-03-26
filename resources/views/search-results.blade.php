@extends('layouts.master')

@section('title')
Search Results
@endsection

@section('content')
<section id="searchResults">
    <div class="container ">
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


        <div class="aa-product-catg-body">
            <h2 style="margin-top:20px;">Search Results</h2>
            <h3 style="margin:20px 0px;">({{$products->total()}}) results for '{{request()->input('query')}}'</h3>
            <ul class="aa-product-catg">
                <!-- start single product item -->
                @foreach ($products as $product)
                <li>
                    <figure>
                        <a class="aa-product-img" href="{{route('shop.show', $product->slug)}}"><img
                                src="{{productImage($product->image)}}" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                            <h4 class="aa-product-title"><a
                                    href="{{route('shop.show', $product->slug)}}">{{$product->name}}</a>
                            </h4>
                            <span class="aa-product-price">${{$product->price}}</span><span
                                class="aa-product-price"><del>${{$product->price*2}}</del></span>
                        </figcaption>
                    </figure>
                    <div class="aa-product-hvr-content">
                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title=""
                            data-original-title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="" data-toggle="modal"
                            data-target="#quick-view-modal" data-original-title="Quick View"><span
                                class="fa fa-search"></span></a>
                    </div>
                    <!-- product badge -->
                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>
                @endforeach
            </ul>

        </div>
    </div>
    <div class="container">
        {{$products->appends(request()->input())->links()}}
    </div>
</section>
@endsection



@section('extra-js')

@endsection