<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
      
    */
    public function index()
    {
        //check if the get request has an argument to show products by categories
        if (request()->category) {
            //show products by category based on slug
            $products = Product::with('categories')
                ->whereHas('categories', function ($query) {
                    $query->where('slug', request()->category);
                })->get();
            $categories = categoriesList();
        } else {
            //show products randomly (user didn't choose to see products by category)
            $products   = Product::inRandomOrder()->take(12)->get();
            $categories = categoriesList();
        }

        if (request()->sort == 'low_high')
        { 
            $products = $products->sortBy('price');

        } else if (request()->sort == 'high_low')
        {
            $products = $products->sortByDesc('price');
        }

        
        return view('shop')->with(
                [
                    'products' => $products,
                    'categories' => $categories
                ]
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * Display the specified resource.
     *
     * @param  string  $slug 
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $relatedProducts = Product::where('slug', '!=', $slug)
            ->inRandomOrder()
            ->take(8)
            ->get();

        return view('product-detail', [
            'product' => $product,
            'relatedProducts' => $relatedProducts
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        //
    }
}
