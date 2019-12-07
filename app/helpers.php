<?php

use App\Product;
use App\Category;

function presentPrice($price)
{

  return '$' . $price / 100;
}

function categoriesList()
{
  $categories = Category::all();

  return $categories;
}

function getProducts($category = null)
{
  //check if the get request has an argument to show products by categories
  if ($category != null) {
    //show products by category based on slug
    $products = Product::with('categories')
      ->whereHas('categories', function ($query) {
        $query->where('slug', request()->category);
      })->get();
  } else {
    //show products randomly (user didn't choose to see products by category)
    $products   = Product::inRandomOrder()->take(12)->get();
  }

  return $products;
}
function sortProducts($products, $sortWay)
{
  if ($sortWay == 'low_high') {
    $products = $products->sortBy('price');
  } else if ($sortWay == 'high_low') {
    $products = $products->sortByDesc('price');
  }

  return $products;
}
