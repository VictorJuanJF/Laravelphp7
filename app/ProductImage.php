<?php

namespace appbrus;

use Illuminate\Database\Eloquent\Model;
use appbrus\Product;

class ProductImage extends Model
{
    // $productImage->product
	public function product(){
		return $this->belongsTo(Product::class);
	}

}
