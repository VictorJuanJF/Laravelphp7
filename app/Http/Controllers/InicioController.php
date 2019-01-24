<?php

namespace appbrus\Http\Controllers;

use Illuminate\Http\Request;
use appbrus\Product;

class InicioController extends Controller
{
	public function index()
	{
		$products=Product::paginate(10);
		return view('welcome')->with(compact('products')); //listado

		// $products=Product::all();
		// return view('welcome')->with(compact('products'));
	}
}