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
        //show products by category
        if (request()->category) {
            $products = getProducts(request()->category);
        } else {
            //show products randomly
            $products = getProducts();
        }
        //get categories list
        $categories = categoriesList();

        //sort products
        $products = sortProducts($products, request()->sort);

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

    public function search(Request $request)
    {
        //Query must has at least 3 characters
        $request->validate([
            'query' => 'required|min:3',
        ]);

        //Get products that contains characters of the query 
        $query = $request->input('query');

        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(6);

        return view('search-results')->with('products', $products);
    }
}
