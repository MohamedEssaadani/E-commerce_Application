<?php

use App\Category;

function presentPrice($price)
 {

    return '$'.$price/100;
 }
 
 function categoriesList()
 {
   $categories = Category::all();

   return $categories;
 }