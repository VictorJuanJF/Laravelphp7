<?php

namespace appbrus;

use Illuminate\Database\Eloquent\Model;
use appbrus\CartDetail;

class Cart extends Model
{
	public function details(){
		return $this->hasMany(CartDetail::class);
	}
}
