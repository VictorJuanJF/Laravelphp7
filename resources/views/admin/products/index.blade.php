@extends('layouts/app')
@section('body-class','product-page')
@section('title','Listado de productos')
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
      <h2 class="title">Listado de disponibles</h2>
      <div class="team">
        <div class="row">
          <div class="center"><a href="{{url('/admin/products/create')}}" class="btn btn-primary btn-round">Nuevo Producto</a></div>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th>Nombre</th>
                <th class="col-md-4">Descripcion</th>
                <th>Categoría</th>
                <th class="text-right">Precio</th>
                <th class="text-right">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
              <tr>
                <td class="text-center">{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->category?$product->category->name:'General'}}</td>
                <td class="text-right">${{$product->price}}</td>
                <td class="td-actions text-right">
                  <button type="button" rel="tooltip" title="Ver producto" class="btn btn-info">
                    <i class="material-icons">info</i>
                  </button>
                  <a href="{{url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success">
                    <i class="material-icons">edit</i>
                  </a>
                  <form method="POST" action="{{url('/admin/products/'.$product->id)}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger">
                      <i class="material-icons">close</i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="center">{{$products->links()}}</div>
        </div>
      </div>
    </div>

  </div>
</div>
<footer class="footer footer-default">
  <div class="container">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com">
            Creative Tim
          </a>
        </li>
        <li>
          <a href="https://creative-tim.com/presentation">
            About Us
          </a>
        </li>
        <li>
          <a href="http://blog.creative-tim.com">
            Blog
          </a>
        </li>
        <li>
          <a href="https://www.creative-tim.com/license">
            Licenses
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script>, made with <i class="material-icons">favorite</i> by
      <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
    </div>
  </div>
</footer>
@endsection
