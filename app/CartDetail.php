<?php

namespace appbrus;

use Illuminate\Database\Eloquent\Model;
use appbrus\Product;

class CartDetail extends Model
{
	public function product(){
		return $this->belongsTo(Product::class);
	}
	public function getSubTotalAttribute(){
		$quantity=$this->quantity;
		$price=$this->product->price;
		$sub_total=$quantity*$price;
		return $sub_total;
	}
}
