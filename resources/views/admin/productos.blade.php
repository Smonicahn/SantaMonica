@extends('adminlte::page')

@section('title', 'Santa Monica')

@section('content_header')
<h1>Productos</h1>
@stop


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css">
@endsection


@section('content')

<button type="button" class="btn btn-success" data-toggle="modal" data-target="#producto">+ Agregar</button>

                <div class="modal fade bd-example-modal-sm" id="producto" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nueva Registro de Producto</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <p>Ingrese Datos</p>
      
       
      </div>
      <div class="modal-footer">
      <div class="d-grid gap-2 col-6 mx-auto"><!-- DIV PARA CENTRAR FORMULARIO--->
      <form action="{{ route ('productos.store') }}" method="post">
            
              @csrf

<div class="mb-3">
  <label for="producto" class="form-label">COD_PROVEEDOR</label>
  <input type="text" class="form-control" id="proveedor" name="proveedor" placeholder="Ingrese el codigo del proveedor">
</div>
<div class="mb-3">
  <label for="producto" class="form-label">NOM_PRODUCTO</label>
  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del producto" onkeyup="convertir('nombre'), this.value= LetrasEspacio(this.value)"required>
</div>
<div class="mb-3">
  <label for="producto" class="form-label">TIPO_PRODUCTO</label>
  <input type="text" class="form-control" id="tipo" name="tipo" placeholder="Ingrese el tipo de producto" onkeyup="convertir('tipo'), this.value= LetrasEspacio(this.value)"required>
</div>
<div class="mb-3">
  <label for="producto" class="form-label">DESC_PRODUCTO</label>
  <input type="text" class="form-control" id="desc" name="desc" placeholder="Ingrese el descuento del producto" onkeyup="convertir('desc'), this.value= LetrasEspacio(this.value)"required>
</div>
<div class="mb-3">
  <label for="producto" class="form-label">UN_COMPRA</label>
  <input type="text" class="form-control" id="compra" name="compra" placeholder="Ingrese las unidades de compra">
</div>
<div class="mb-3">
  <label for="producto" class="form-label">UN_VENTA</label>
  <input type="text" class="form-control" id="venta" name="venta" placeholder="Ingrese las unidades de venta">
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
                   <th>Cod Producto</th>
                   <TH>Cod Proveedor</TH>
                   <th>Nom. Producto</th>
                   <th>Tipo Producto</th>
                   <th>Desc. Producto</th>  
                   <th>Unidades Compradas </th>
                   <th>Unidades Vendidas </th>
                   <th>Editar </th>
                </tr>
               </tr>
        </thead>

        <tbody>
        @foreach($mostrar as $productos)
                    <tr>
                         <td>
                         <label class="label">{{$productos['COD_PRODUCTO']}}</label>
                         </td>
                         <td>
                         <label class="label">{{$productos['COD_PROVEEDOR']}}</label>
                         </td>
                         <td>
                         <label class="label">{{$productos['NOM_PRODUCTO']}}</label>
                         </td>
                         <td>
                            <label class="label">{{$productos['TIPO_PRODUCTO']}}</label>
                            </td>
                         <td>
                        <label class="label">{{$productos['DESC_PRODUCTO']}}</label>
                        </td>
                        <td>
                        <label class="label">{{$productos['UN_COMPRA']}}</label>
                        </td>
                        <td>
                            <label class="label">{{$productos['UN_VENTA']}}</label>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="/productos/edit/{{ $productos['COD_PRODUCTO'] }}">
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


<script> //<!--Funciones de caracteres validos-->

// sustituye los dos espacios por uno
function espacios(CajaTexto){
 var input = document.getElementById(CajaTexto);
    input.value = input.value.replace('  ', ' '); //sustituimos dos espacios seguidos por uno

}


function Letras(string){//solo letras y numeros
var out = '';
//Se añaden las letras validas
var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíúóüÁÉÍÓÚÜ';//Caracteres validos
for (var i=0; i<string.length; i++)
   if (filtro.indexOf(string.charAt(i)) != -1)
   out += string.charAt(i);
  return out;
}
function LetrasEspacio(string){//solo letras y numeros
var out = '';
//Se añaden las letras validas
var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíúóüÁÉÍÓÚÜ ';//Caracteres validos
for (var i=0; i<string.length; i++)
   if (filtro.indexOf(string.charAt(i)) != -1)
   out += string.charAt(i);
  return out;
}
function LetrasEspacioNumeros(string){//solo letras y numeros
var out = '';
//Se añaden las letras validas
var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíúóüÁÉÍÓÚÜ1234567890- ';//Caracteres validos
for (var i=0; i<string.length; i++)
   if (filtro.indexOf(string.charAt(i)) != -1)
   out += string.charAt(i);
  return out;
}
function Numeros(string){//solo letras y numeros
var out = '';
//Se añaden las letras validas
var filtro = '1234567890,.';//Caracteres validos
for (var i=0; i<string.length; i++)
   if (filtro.indexOf(string.charAt(i)) != -1)
   out += string.charAt(i);
  return out;
}
function calcular_edad() {
  var form = document.getElementById('fech_nacimiento').value; //fecha de nacimiento en el formulario
  var fechaNacimiento = form.split("-");
  var annoNac = fechaNacimiento[0];
  var mesNac = fechaNacimiento[1];
  var diaNac = fechaNacimiento[2];

  var fechaHoy = new Date(); // detecto la fecha actual y asigno el dia, mes y anno a variables distintas
  var annoActual = fechaHoy.getFullYear();
  var mesActual = fechaHoy.getMonth() + 1;
  var diaActual = fechaHoy.getDate();

  var edad = annoActual - annoNac;
  if (mesNac > mesActual) {
    //alert('mes de nacimiento mayor');
    edad--;
  }
  if (mesNac == mesActual) {
    //alert('mes igual');
    if (diaNac > diaActual) {
      //alert('dia de nacimiento mayor');
      edad--;
    }
  }
  document.getElementById('edad').value = edad;
}

function convertir(CajaTexto) {
  // Recibes el texto input del html y conviertes todos los caracteres a minúscula
  let nombre = document.getElementById(CajaTexto).value.toLowerCase();
 
  // Esta expresion regular busca un conjunto de caracteres que no sean espacios
  //Cada grupo encontrado lo remplaza por si mismo con la primera letra mayuscula
  nombre = nombre.replace(/([^\s]+)/gm, function (textoEncontrado) {
          return textoEncontrado.charAt(0).toUpperCase() + textoEncontrado.substring(1);
  });
 
  // Finalmente asignas el output al elemento hmtl
  document.getElementById(CajaTexto).value = nombre;
}
//función que capitaliza la primera letra caja de texto primer nombre
function capitalizarPrimeraLetra(CajaTexto) {
 var input = document.getElementById(CajaTexto);
 //almacenamos el valor del input
  var palabra = input.value;
  //Si el valor es nulo o undefined salimos
  if(!input.value) return;
  // almacenamos la mayuscula
  var mayuscula = palabra.substring(0,1).toUpperCase();
  //si la palabra tiene más de una letra almacenamos las minúsculas
  if (palabra.length > 0) {
    var minuscula = palabra.substring(1).toLowerCase();
  }
  //escribimos la palabra con la primera letra mayuscula
  input.value = mayuscula.concat(minuscula);
}
</script>
@Stop