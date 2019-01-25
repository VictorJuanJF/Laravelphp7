@extends('layouts/app')
@section('body-class','product-page')
@section('title','Welcome to EasyResearch')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section">
      <h2 class="title text-center">Editar producto: {{$product->name}} </h2>
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif
      <form method="POST" action="{{url('/admin/products/'.$product->id.'/edit')}}">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInput1" class="bmd-label-floating">Nombre del producto</label>
              <input type="text" class="form-control" id="exampleInput1" name="name" value="{{old('name',$product->name)}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInput1" class="bmd-label-floating">Precio del producto</label>
              <input type="number" step="0.01" class="form-control" id="exampleInput1" name="price" value="{{old('price',$product->price)}}" >
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInput1" class="bmd-label-floating">Descripción corta</label>
          <input type="text" class="form-control" id="exampleInput1" name="description" value="{{old('description',$product->description)}}">
        </div>

        <div class="form-group">
          <textarea placeholder="Descripción extensa del producto" class="form-control" id="exampleFormControlTextarea1" rows="5" name="long_description">{{old('long_description',$product->long_description)}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <a href="{{url('admin/products')}}" class="btn btn-danger">Cancelar</a>
      </form>
    </div>

  </div>
</div>
@endsection
