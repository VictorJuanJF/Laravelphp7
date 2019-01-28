<?php

namespace appbrus\Http\Controllers;

use Illuminate\Auth\user;
use Illuminate\Http\Request;
use appbrus\CartDetail;

class CartDetailController extends Controller
{
	public function store(Request $request){
		$cartDetail=new CartDetail();
		$cartDetail->cart_id=auth()->user()->cart->id;
		$cartDetail->product_id=$request->product_id;
		$cartDetail->quantity=$request->quantity;
		$cartDetail->save();
		$notification='El producto se ha cargado al carrito brus correctamente';
		return back()->with(compact('notification'));
	}
	public function destroy(Request $request){
		$cartDetail=CartDetail::find($request->cart_detail_id);
		if($cartDetail->cart_id==auth()->user()->cart->id){
			$cartDetail->delete();

		}

		$notification='El producto se ha eliminado del carrito brus correctamente';
		return back()->with(compact('notification'));
	}
}
