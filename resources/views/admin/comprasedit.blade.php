@extends('adminlte::page')


@section('title', 'Marisqueria Santa Monica')

@section('content_header')
<h1>Compras</h1>
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Busqueda</a></li>
        <li class="breadcrumb-item active">Compras</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
@csrf
<div class="card-body">
         <form  method="POST" action="/compras/update/{{$mostrarArray['COD_COMPRAS']}}" id="frmnuevo" name="frmnuevo" class="needs-validation"  enctype="multipart/form-data" novalidate>
         @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="compra" class="form-label">COD_PROVEEDOR</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value= "{{$mostrarArray['COD_PROVEEDOR']}}" placeholder="Ingrese el codigo proveedor">
            </div>
            <div class="mb-3">
                <label for="cliente" class="form-label">CANTIDAD</label>
                <input type="text" class="form-control" id="canti" name="canti" value= "{{$mostrarArray['CANTIDAD']}}" placeholder="Ingrese la cantidad">
            </div>
            <div class="mb-3">
                <label for="compra" class="form-label">PRECIO</label>
                <input type="text" class="form-control" id="precios" name="precios" value= "{{$mostrarArray['PRECIO']}}" placeholder="Ingrese el precio">
            </div>
            <div class="mb-3">
                <label for="compra" class="form-label">METODO DE PAGO</label>
                <input type="text" class="form-control" id="metodo" name="metodo" value= "{{$mostrarArray['COD_METODOPAGO']}}" placeholder="Ingrese el metodo de pago">
            </div>
            <a href="{{ route('compras.index') }}"  class="btn btn-danger">Cancelar</a>
            <button type="submit" class="btn btn-success float-right">Actualizar</button>         
        </form>
        <!-- /.form group -->
        <!-- /.card-body -->
    </div>
<!-- /.card -->
@stop



@section('footer')

<div class="float-right d-none d-sm-block">
  <b>Version</b> 3.1.0
</div>
<strong>Copyright &copy; 2014-2021 <a href="">Marisqueria Santa Monica</a>.</strong> All rights reserved.

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">