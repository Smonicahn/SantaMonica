@extends('adminlte::page')


@section('title', 'Marisqueria Santa Monica')

@section('content_header')
<h1>Empleados</h1>
@stop

@section('content')
@csrf
<div class="card-body">
         <form  method="POST" action="/metodo/update/{{$mostrarArray['COD_METODOPAGO']}}" id="frmnuevo" name="frmnuevo" class="needs-validation"  enctype="multipart/form-data" novalidate>
         @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="metodo" class="form-label">TIP_PAGO</label>
                <input type="text" class="form-control" id="pago" name="pago" value= "{{$mostrarArray['TIP_PAGO']}}" placeholder="Ingrese el tipo de pago" onkeyup="convertir('pago'), this.value= LetrasEspacio(this.value)"required>
            </div>
            <div class="mb-3">
                <label for="metodo" class="form-label">NUM_TARJ_BAN</label>
                <input type="text" class="form-control" id="numero" name="numero" value= "{{$mostrarArray['NUM_TARJ_BAN']}}" placeholder="Ingrese el numero de la tarjeta">
            </div>
            <div class="mb-3">
                <label for="metodo" class="form-label">TIT_TAR</label>
                <input type="text" class="form-control" id="titular" name="titular" value= "{{$mostrarArray['TIT_TAR']}}" placeholder="Ingrese el titular de la tarjeta" onkeyup="convertir('titular'), this.value= LetrasEspacio(this.value)"required>
            </div>
            <div class="mb-3">
                <label for="metodo" class="form-label">FEC_EMI</label>
                <input type="text" class="form-control" id="emision" name="emision" value= "{{$mostrarArray['FEC_EMI']}}" placeholder="Ingrese la fecha de emision">
            </div>
            <div class="mb-3">
                <label for="metodo" class="form-label">FEC_VEN</label>
                <input type="text" class="form-control" id="vencimiento" name="vencimiento" value= "{{$mostrarArray['FEC_VEN']}}" placeholder="Ingrese la facha de vencimiento">
            </div>
            <div class="mb-3">
                <label for="metodo" class="form-label">COD_SEG</label>
                <input type="text" class="form-control" id="seguridad" name="seguridad" value= "{{$mostrarArray['COD_SEG']}}" placeholder="Ingrese el codigo de seguridad">
            </div>
            <a href="{{ route('metodo.index') }}"  class="btn btn-danger">Cancelar</a>
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
@Stop

@section('js')
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

