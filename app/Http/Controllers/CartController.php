<?php

namespace appbrus\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
	public function update(){
		$cart=auth()->user()->cart;
		$cart->status='Pending';
		$cart->save();
		$notification='Tu pedido se ha realizado exitosamente, te contactaremos pronto via email';
		return back()->with(compact('notification'));
	}
}
