@extends('adminlte::page')

@section('title', 'Santa Monica')

@section('content_header')
<h1>Correos</h1>
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Busqueda</a></li>
        <li class="breadcrumb-item active">Correos</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@stop

@section('content')
    <div class = "card">
        <div class = "card-body">


<div class="card-header">
    <a class="btn btn-primary" href="">Agregar</a>
    <i class="fa fa-plus-circle"></i>
</div>



<table id="productos" class="table table-striped table-bordered" style="width:100%">
         <thead>
               <tr>
                   <th>COD_CORREO</th>
                   <TH>TIP_CORREO</TH>
                   <th>CORREO</th>
                   <th>Editar</th>
                </tr>
               </tr>
        </thead>

        <tbody>
        @foreach($mostrar as $correos)
                    <tr>
                         <td>
                         <label class="label">{{$correos['COD_CORREO']}}</label>
                         </td>
                         <td>
                         <label class="label">{{$correos['TIP_CORREO']}}</label>
                         </td>
                         <td>
                         <label class="label">{{$correos['CORREO']}}</label>
                         </td>
                        <td>
                            <a class="btn btn-warning" href="">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
       </table>
      </div>
    </div>
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