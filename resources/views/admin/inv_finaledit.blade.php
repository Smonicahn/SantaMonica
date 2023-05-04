@extends('adminlte::page')

@section('title', 'Santa Monica')

@section('content_header')
<h1>Inventario</h1>
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Busqueda</a></li>
        <li class="breadcrumb-item active">Inventario</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
<div class="card-body">
    <form  method="POST" action="/inv_final/update/{{$mostrarArray['COD_INV_FINAL']}}" id="frmnuevo" name="frmnuevo" class="needs-validation"  enctype="multipart/form-data" novalidate>
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inventario" class="form-label">COD_PRODUCTO</label>
            <input type="text" class="form-control" id="producto" name="producto" value= "{{$mostrarArray['COD_PRODUCTO']}}"  placeholder="Ingrese el codigo del producto">
        </div>
        <div class="mb-3">
            <label for="inventario" class="form-label">COD_INV_COMPRA</label>
            <input type="text" class="form-control" id="invcompra" name="invcompra" value= "{{$mostrarArray['COD_INV_COMPRA']}}"  placeholder="Ingrese el codigo inventario compra">
        </div>
        <div class="mb-3">
            <label for="inventario" class="form-label">COD_INV_VENTA</label>
            <input type="text" class="form-control" id="invventa" name="invventa" value= "{{$mostrarArray['COD_INV_VENTA']}}"  placeholder="Ingrese el codigo inventario venta">
        </div>
        <div class="mb-3">
            <label for="inventario" class="form-label">CANTIDAD</label>
            <input type="text" class="form-control" id="cantidades" name="cantidades" value= "{{$mostrarArray['CANTIDAD']}}"  placeholder="Ingrese la cantidad">
        </div>
        <a href="{{ route('inv_final.index') }}"  class="btn btn-danger">Cancelar</a>
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
@stop