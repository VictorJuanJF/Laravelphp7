<?php

namespace appbrus\Http\Controllers\Admin;

use appbrus\Http\Controllers\Controller;

use Illuminate\Http\Request;
use appbrus\Product;

class ProductController extends Controller
{
	public function index(){
		$products=Product::paginate(10);
		return view('admin.products.index')->with(compact('products')); //listado
	}
	public function create(){

		return view('admin.products.create'); //formulario de registro
	}
	public function store(Request $request){
		// registrar nuevo producto en la bd
		// dd($request->all());
		$validatedData = $request->validate([
			'name'=>'required|min:3',
			'description'=>'required|max:240',
			'price'=>'required|numeric|min:0'
		],[
			'name.required'=>'Ingresa el nombre del producto',
			'name.min'=>'El mínimo de caracteres para el nombre es 3',
			'description.required'=>'La descripción del producto es obligatoria',
			'price.required'=>'El precio es obligatorio',
			'price.numeric'=>'El precio debe ser de tipo numérico',
			'price.min'=>'Ingresa un precio válido'
		]);
		$product=new Product();
		$product->name=$request->input('name');
		$product->description=$request->input('description');
		$product->price=$request->input('price');
		$product->long_description=$request->input('long_description');
		$product->save();	//INSERT
		return redirect('/admin/products');
	}
	public function edit($id){
		$product=Product::find($id);
		return view('admin.products.edit')->with(compact('product'));
	}
	public function update(Request $request,$id){
		// registrar nuevo producto en la bd
		// dd($request->all());
		//Validacion
		$validatedData = $request->validate([
			'name'=>'required|min:3',
			'description'=>'required|max:240',
			'price'=>'required|numeric|min:0'
		],[
			'name.required'=>'Ingresa el nombre del producto',
			'name.min'=>'El mínimo de caracteres para el nombre es 3',
			'description.required'=>'La descripción del producto es obligatoria',
			'description.max'=>'La cantidad máxima de caracteres es 240 palabras',
			'price.required'=>'El precio es obligatorio',
			'price.numeric'=>'El precio debe ser de tipo numérico',
			'price.min'=>'Ingresa un precio válido'
		]);

		$product=Product::find($id);
		$product->name=$request->input('name');
		$product->description=$request->input('description');
		$product->price=$request->input('price');
		$product->long_description=$request->input('long_description');
		$product->save();	//Update
		return redirect('/admin/products');
	}
	public function destroy($id){
		// registrar nuevo producto en la bd
		// dd($request->all());
		$product=Product::find($id);
		$product->delete();
		return back();
	}
	public function show(){

	}
}
