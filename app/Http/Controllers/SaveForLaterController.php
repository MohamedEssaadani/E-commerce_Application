<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class SaveForLaterController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('saveForLater')->remove($id);

        return back()->with('success_message', 'Item has been removed from saved for later!');
    }

    
    /**
     * Switch Item From Saved For Later To Cart.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToCart($id)
    {
        $item = Cart::instance('saveForLater')->get($id);

        Cart::instance('saveForLater')->remove($id);

        $duplicates = Cart::instance('default')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart');
        }

        Cart::instance('default')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item has been moved to cart!');
    }
}
