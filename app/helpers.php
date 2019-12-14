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
      });
  } else {
    //show products randomly (user didn't choose to see products by category)
    $products = Product::take(12);
  }

  return $products;
}


function sortProducts($products, $sortWay)
{
  $pagination = 9;

  if ($sortWay == 'low_high') {
    $products = $products->orderBy('price')->paginate($pagination);
  } else if ($sortWay == 'high_low') {
    $products = $products->orderBy('price', 'desc')->paginate($pagination);
  } else {
    $products = $products->paginate($pagination);
  }

  return $products;
}

