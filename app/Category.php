<?php

namespace appbrus;

use Illuminate\Database\Eloquent\Model;
use appbrus\Product;

class Category extends Model
{
    // $category->products
	public function products(){
		return $this->hasMany(Product::class);
	}
}
