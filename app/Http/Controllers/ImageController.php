<?php

namespace appbrus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use appbrus\Product;
use appbrus\ProductImage;

class ImageController extends Controller
{
	public function index($id){
		$product=Product::find($id);
		$images=$product->images;
		return view('admin.products.images.index')->with(compact('product','images'));
	}
	public function store(Request $request,$id){
		//Guardar la imagen en el proyecto
		$file=$request->file('photo');
		$name=$file->getClientOriginalName();
		$path=public_path().'/images/products';
		$fileName=uniqid().$name;
		$moved=$file->move($path,$fileName);
		//Crear un registro en la bd, product_images
		if($moved){
			$productImage=new ProductImage();
			$productImage->image=$fileName;
		// $productImage->featured=$fileName;
			$productImage->product_id=$id;
			$productImage->save(); //INSERT
		}

		return back();

	}
	public function destroy(Request $request){
		//eliminar el archivo
		$productImage=ProductImage::find($request->image_id);
		if(substr($productImage->image,0,4)==="http"){
			$deleted=true;
		} else{
			$fullPath=public_path().'/images/products/'.$productImage->image;
			$deleted=Storage::delete($fullPath);
		}
		if($deleted){
			$productImage->delete();
		}
		return back();
		
	}
}
