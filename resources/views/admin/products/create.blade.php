@extends('layouts/app')
@section('body-class','product-page')
@section('title','Welcome to EasyResearch')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section">
      <h2 class="title text-center">Registrar nuevo producto</h2>
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form method="POST" action="{{url('/admin/products')}}">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInput1" class="bmd-label-floating">Nombre del producto</label>
              <input type="text" class="form-control" id="exampleInput1" name="name" value="{{old('name')}}">
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label for="exampleInput1" class="bmd-label-floating">Precio del producto</label>
              <input type="number" class="form-control" id="exampleInput1" name="price" value="{{old('price')}}">
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="exampleInput1" class="bmd-label-floating">Descripción corta</label>
          <input type="text" class="form-control" id="exampleInput1" name="description" value="{{old('description')}}">
        </div>

        <div class="form-group">
          <textarea placeholder="Descripción extensa del producto" class="form-control" id="exampleFormControlTextarea1" rows="5" name="long_description">{{old('long_description')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Registrar producto</button>
      </form>
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
