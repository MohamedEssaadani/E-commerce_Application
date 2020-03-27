<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Searchable;

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
