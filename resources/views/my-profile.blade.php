@extends('layouts.master')

@section('title')
Products
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
                            <h3>My Profile</h3>
                        </div>
                    </div>
                    <div class="aa-product-catg-body">
                        <div class="container" style="margin-bottom:50px;">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">

                                        <div class="card-body">
                                            <form method="POST" action="{{route('user.update')}}">
                                                @method('patch')
                                                @csrf
                                                <div class="form-group row">
                                                    <label for="name"
                                                        class="col-md-4 col-form-label text-md-right">Name</label>

                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control" name="name"
                                                            value="{{ old('name', $user->name) }}" required>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="email"
                                                        class="col-md-4 col-form-label text-md-right">Email
                                                        Address</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control "
                                                            name="email" value="{{ old('email', $user->email) }}">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password"
                                                        class="col-md-4 col-form-label text-md-right">Password</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control"
                                                            name="password">
                                                        <label>Leave it blank to leave current
                                                            password</label>
                                                    </div>

                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-confirm"
                                                        class="col-md-4 col-form-label text-md-right">Confirm
                                                        Password</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password"
                                                            class="form-control" name="password_confirmation">
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-primary"
                                                            style="background-color:#333333!important;">
                                                            Update Profile
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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