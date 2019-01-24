<?php

namespace appbrus;

use Illuminate\Database\Eloquent\Model;
use appbrus\Category;
use appbrus\ProductImage;

class Product extends Model
{
    // $product->category
	public function category(){
		return $this->belongsTo(Category::class);
	}
	// $product->images
	public function images(){
		return $this->hasMany(ProductImage::class);
	}

}
