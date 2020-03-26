@component('mail::message')
# Order Received

Thank you for your order.

**Order ID:** {{$order->id}}

**Order Email:** {{$order->billing_email}}

**Order Total:** ${{$order->billing_total}}

**Items Ordered**

@foreach ($order->products as $product)
**Name: ** {{$product->name}} <br>
**Price: ** {{$product->price}} <br>
**Quantity: ** {{$product->pivot->quantity}}
@endforeach

You can get further details about your order by loggin into our website.

@component('mail::button', ['url' => config('app.url'), 'color' => 'green'])
Go to website
@endcomponent

Thank you again for choosing us.

Regards, <br>
{{config('app.name')}}
@endcomponent