<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['quantity'];

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
