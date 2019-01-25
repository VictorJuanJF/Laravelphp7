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
	public function getUrlAttribute(){
		if(substr($this->image,0,4)==="http"){
			return $this->image;
		}
		else{
			return '/images/products/'.$this->image;
		}
	}

}
