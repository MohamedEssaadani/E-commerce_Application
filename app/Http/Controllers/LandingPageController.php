<?php

namespace App\Http\Controllers;

use App\Category;
use App\Slide;
use App\Product;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get eight products to show in landing page
        $products = Product::inRandomOrder()
            ->take(8)
            ->get();

        //get slides 
        $slides = Slide::inRandomOrder()
            ->get();

        //get categories
        $categories = Category::inRandomOrder()
            ->take(5)
            ->get();

        return view('landing-page')->with('products', $products)
            ->with('slides', $slides)
            ->with('categories', $categories);
    }
}
