@extends('adminlte::page')


@section('title', 'Marisqueria Santa Monica')

@section('content_header')
<h1>Reportes</h1>

@section('content')


<div class = "card">
        <div class = "card-body">


<div class="card-header">
    <a class="btn btn-primary" href="">Agregar</a>
    <i class="fa fa-plus-circle"></i>
</div>
   
  <!-- /.card-header -->
  <table id="productos" class="table table-striped table-bordered" style="width:100%">
 <THEad>
      <tr>
      <th>Reporte</th>
        <th>Nombre</th>
        <th>Usuario</th>
        <th>Detalles</th>
        <th>Codigo de Formato</th>
        <th>Fecha Desde</th>
        <th>Fecha Hasta</th>
        <th>Opciones de Tabla</th>
        </tr>
      </thead>

      <tbody>
       
        <tr>
        <td>1</td>
        <td>JUAN</td>
        <td>JUANML</td>
        <TD>VENTA DE 500 UNIDADES REALIZADA</TD>
        <TD>EXC</TD>
        <TD>22-10-1</TD>
        <TD>22-11-2</TD>
        <td>       

        <a class="btn btn-warning" href="">
                                <i class="fa fa-edit"></i>
                            </a>
       </td>
        </tr>
       
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