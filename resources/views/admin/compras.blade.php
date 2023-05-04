@extends('adminlte::page')


@section('title', 'Marisqueria Santa Monica')

@section('content_header')
<h1>Compras</h1>
<br>
@stop

@section('content')

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#compra">+ Agregar</button>
                <div class="modal fade bd-example-modal-sm" id="compra" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Registro de Compra</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <p>Ingrese Datos</p>
      
       
      </div>
      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto"><!-- DIV PARA CENTRAR FORMULARIO--->
      <form action="{{ route ('compras.store') }}" method="post">
            
              @csrf

<div class="mb-3">
  <label for="compra" class="form-label">COD_PROVEEDOR</label>
  <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el codigo proveedor">
</div>
<div class="mb-3">
  <label for="compra" class="form-label">CANTIDAD</label>
  <input type="text" class="form-control" id="canti" name="canti" placeholder="Ingrese la cantidad">
</div>
<div class="mb-3">
  <label for="compra" class="form-label">PRECIO</label>
  <input type="text" class="form-control" id="precios" name="precios" placeholder="Ingrese el precio">
</div>
<div class="mb-3">
  <label for="compra" class="form-label">METODO DE PAGO</label>
  <input type="text" class="form-control" id="metodo" name="metodo" placeholder="Ingrese el metodo de pago">
</div>



              <button type = "submit"  class="btn btn-primary">enviar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">cancelar</button>
          </form>
          </div><!-- DIV PARA CENTRAR FORMULARIO--->
          <!-- boton cancelar movido -->
      </div>
    </div>
  </div>
</div>


<div class = "card">
        <div class = "card-body">

   
  <!-- /.card-header -->
  <table id="productos" class="table table-striped table-bordered" style="width:100%">
 <thead>
      <tr>
          <th>Nº</th>
          <th>COD_PROVEEDOR</th>
          <th>CANTIDAD</th>
          <th>PRECIO</th>
          <th>COD_METODOPAGO</th>
          <th>EDITAR</th>
        </tr>
      </thead>

      <tbody>
      @foreach($mostrar as $compras) 
        <tr>
        <td>{{$compras['COD_COMPRAS']}}</td>
        <td>{{$compras['COD_PROVEEDOR']}}</td>
        <td>{{$compras['CANTIDAD']}}</td>
        <td>{{$compras['PRECIO']}}</td>
        <td>{{$compras['COD_METODOPAGO']}}</td>
        <td>       
            <a class="btn btn-warning" href="/compras/edit/{{ $compras['COD_COMPRAS'] }}">
                                <i class="fa fa-edit"></i>
                            </a>
       </td>
        </tr>
      @endforeach 
      </tbody>
    </table>
  </div>
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


@section('js')

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
<script>
  $('#productos').DataTable({
    responsive: true,
    autWidth: false,

    "language": {
            "lengthMenu": "Mostrar  _MENU_ registros por página",
            "zeroRecords": "Nada encontrado - disculpas",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",

            'search' : 'Buscar:',
            'paginate' : {
              'next': 'Siguiente',
              'previous' : 'Anterior'
            }

        }
  });


</script>
@endsection




@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection