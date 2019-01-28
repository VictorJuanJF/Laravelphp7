@extends('layouts/app')
@section('body-class','product-page')
@section('title','EasyResearch Dashboard')
@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/profile_city.jpg')}}')">

</div>
<div class="main main-raised">
  <div class="container">

    <div class="section">
      <h2 class="title text-center">Dashboard</h2>
      @if (session('notification'))
      <div class="alert alert-success" role="alert">
        {{ session('notification') }}
      </div>
      @endif
      <ul class="nav nav-pills nav-pills-icons" role="tablist">
    <!--
        color-classes: "nav-pills-primary", "nav-pills-info", "nav-pills-success", "nav-pills-warning","nav-pills-danger"
      -->
      <li class="nav-item">
        <a class="nav-link active" href="#dashboard-1" role="tab" data-toggle="tab">
          <i class="material-icons">dashboard</i>
          Carrito de Compras
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tasks-1" role="tab" data-toggle="tab">
          <i class="material-icons">list</i>
          Pedidos
        </a>
      </li>
    </ul>
    <hr>
    <p>Tu carrito de compras presenta {{auth()->user()->cart->details->count()}} productos.</p>
    <div class="tab-content tab-space">
      <div class="tab-pane active" id="dashboard-1">

        <ul>
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">#</th>
                <th class="">Nombre</th>
                <th class="">Descripcion</th>
                <th>Categoría</th>
                <th class="text-right">Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th class="text-right">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach (auth()->user()->cart->details as $detail)
              <tr>
                <td class="text-center">
                  <img src="{{$detail->product->featured_image_url}}" height="50px">
                </td>
                <td><a href="{{url('/products/'.$detail->product->id)}}">{{$detail->product->name}}</a></td>
                <td>{{$detail->product->description}}</td>
                <td>{{$detail->product->category?$detail->product->category->name:'General'}}</td>
                <td class="text-right">${{$detail->product->price}}</td>
                <td>{{$detail->quantity}}</td>
                <td>{{$detail->sub_total}}</td>
                <td class="td-actions text-right">
                  {{-- <a href="{{url('/products/'.$detail->product->id)}}" target="_blank" type="button" rel="tooltip" title="Ver producto" class="btn btn-info">
                    <i class="material-icons">info</i>
                  </a> --}}



                  <form method="POST" action="{{url('/cart')}}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <input type="hidden" name="cart_detail_id" value="{{$detail->id}}">
                    <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger">
                      <i class="material-icons">close</i>
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </ul>

      </div>
      <div class="text-center">
        <form method="post" action="{{url('/order')}}">
          @csrf
          <button class="btn btn-primary btn-round text-center">
            <i class="material-icons">done</i> Realizar pedido
          </button>
        </form>
      </div>

      <div class="tab-pane" id="tasks-1">
        Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
        <br><br>Dynamically innovate resource-leveling customer service for state of the art customer service.
      </div>
    </div>


  </div>

</div>
</div>
@endsection



