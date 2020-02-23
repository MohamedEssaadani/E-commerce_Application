<ul class="nav navbar-nav">
    @foreach($items as $menu_item)
        <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
    @endforeach
</ul>
<!--
<ul class="nav navbar-nav">
    <li><a href="{{route('landingPage')}}">Home</a></li>
    <li><a href="{{route('shop.index')}}">Shop</a></li>
    <li><a href="#">Blog</a></li>
    <li><a href="{{route('cart.index')}}">Cart</a></li>
    <li><a href="">About</a></li>
    <li><a href="contact.html">Contact</a></li>
</ul>
-->
