<?php

use App\Product;
use App\Category;
use App\CategoryProduct;

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

function productImage($path)
{
  return file_exists('storage/' . $path) ? asset('storage/' . $path) : asset('assets/img/imagenotfound.jpg');
}

//return stock level (quantity of product)
function getStockLevel($quantity)
{
  if ($quantity >= setting('site.stock_threshold')) {
    $stockLevel = '<div class="badge badge-success">In Stock</div>';
  } else if ($quantity < setting('site.stock_threshold') && $quantity > 0) {
    $stockLevel = '<div class="badge badge-warning">Low Stock</div>';
  } else {

    $stockLevel = '<div class="badge badge-danger">Not available</div>';
  }

  return $stockLevel;
}
