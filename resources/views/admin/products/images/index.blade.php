@extends('layouts/app')
@section('body-class','product-page')
@section('title','Imagenes de productos')
@section('css')
{{-- <link href="{{asset('css/myStyles.css')}}" rel="stylesheet" /> --}}
<style>
.center{
  margin: 0 auto;
  padding-bottom: 15px;
}
</style>
@endsection
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">
 {{--  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1 class="title">Welcome to EasyResearch.</h1>
        <h4>Every landing page needs a small description after the big bold title, that&apos;s why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
        <br>
        <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank" class="btn btn-danger btn-raised btn-lg">
          <i class="fa fa-play"></i> Watch video
        </a>
      </div>
    </div>
  </div> --}}
</div>
<div class="main main-raised">
  <div class="container">

    <div class="section text-center">
      <h2 class="title">Imagenes del producto "{{$product->name}}"</h2>

      <form method="post" action="" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo" required>

        <div class="center"><button type="submit" href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round">Subir nueva imagen</button>
          <a href="{{url('/admin/products')}}" class="btn btn-primary btn-round">Volver al listado de productos</a></div>
        </form>


        <div class="row">
          @foreach($images as $image)
          <div class="col-md-4">
            <div class="card text-center" style="width: 18rem;">
              <img class="card-img-top" src="{{$image->getUrlAttribute()}}" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="footer justify-content-center">
                  <form method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="hidden" name="image_id" value="{{$image->id}}">
                    <button href="#pablo" class="btn btn-danger btn-just-icon btn-fill btn-round" rel="tooltip" title="Eliminar">
                      <i class="material-icons">delete</i>
                    </button>
                    @if($image->featured)
                    <button type="button" class="btn btn-info btn-fab btn-fab-mini btn-round" rel="tooltip" title="Imagen destacada de este producto">
                      <i class="material-icons">favorite</i>
                    </button>
                    @else
                    <a href="{{url('/admin/products/'.$product->id.'/images/select/'.$image->id)}}" class="btn btn-primary btn-fab btn-fab-mini btn-round">
                      <i class="material-icons">favorite</i>
                    </a>
                    @endif

                  </form>
                </div>

              </div>
            </div>
          </div>

          @endforeach
        </div>

      </div>

    </div>
  </div>

  @endsection
