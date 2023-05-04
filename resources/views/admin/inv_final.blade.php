@extends('adminlte::page')


@section('title', 'Marisqueria Santa Monica')

@section('content_header')
<h1>Inventario</h1>
@stop

@section('content')

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#inventario">+ Agregar</button>
                <div class="modal fade bd-example-modal-sm" id="inventario" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Registro de Empleado</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <p>Ingrese Datos</p>
      
       
      </div>
      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto"><!-- DIV PARA CENTRAR FORMULARIO--->
      <form action="{{ route ('inv_final.store') }}" method="post">
            
              @csrf

<div class="mb-3">
  <label for="inventario" class="form-label">COD_PRODUCTO</label>
  <input type="text" class="form-control" id="producto" name="producto" placeholder="Ingrese el codigo del producto">
</div>
<div class="mb-3">
  <label for="inventario" class="form-label">COD_INV_COMPRA</label>
  <input type="text" class="form-control" id="invcompra" name="invcompra" placeholder="Ingrese el codigo inventario compra">
</div>
<div class="mb-3">
  <label for="inventario" class="form-label">COD_INV_VENTA</label>
  <input type="text" class="form-control" id="invventa" name="invventa" placeholder="Ingrese el codigo inventario venta">
</div>
<div class="mb-3">
  <label for="inventario" class="form-label">CANTIDAD</label>
  <input type="text" class="form-control" id="cantidades" name="cantidades" placeholder="Ingrese la cantidad">
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



          <table id="productos" class="table table-striped table-bordered" style="width:100%">
 <thead>
      <tr>
          <th>Nº</th>
          <th>COD_PRODUCTO</th>
          <th>COD_INV_COMPRA</th>
          <th>COD_INV_VENTA</th>
          <th>CANTIDAD</th>
          <th>EDITAR</th>
        </tr>
      </thead>

      <tbody>
      @foreach($mostrar as $inv_final) 
        <tr>
        <td>{{$inv_final['COD_INV_FINAL']}}</td>
        <td>{{$inv_final['COD_PRODUCTO']}}</td>
        <td>{{$inv_final['COD_INV_COMPRA']}}</td>
        <td>{{$inv_final['COD_INV_VENTA']}}</td>
        <td>{{$inv_final['CANTIDAD']}}</td>
        <td>       
            <a class="btn btn-warning" href="/inv_final/edit/{{ $inv_final['COD_INV_FINAL'] }}">
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

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection

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