@extends('adminlte::page')

@section('title', 'Santa Monica')

@section('content_header')
<h1>Personas</h1>
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1></h1>
    </div>
    <div class="col-sm-6">
      <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Busqueda</a></li>
        <li class="breadcrumb-item active">Personas</li>
      </ol>
    </div>
  </div>
</div><!-- /.container-fluid -->
@stop

@section('content')

            
@csrf
<div class="card-body">
         <form  method="POST" action="/personas/update/{{$mostrarArray['COD_PERSONA']}}" id="frmnuevo" name="frmnuevo" class="needs-validation"  enctype="multipart/form-data" novalidate>
         @csrf
            @method('PUT')
            <div class="mb-3">
  <label for="persona" class="form-label">ID</label>
  <input type="text" class="form-control" id="identidad" name="identidad" value= "{{$mostrarArray['ID']}}" placeholder="Ingrese el ID">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">NOM_PERSONA</label> 
  <input type="text" class="form-control" id="nombre" name="nombre" value= "{{$mostrarArray['NOM_PERSONA']}}"placeholder="Ingrese el nombre" onkeyup="convertir('nombre'), this.value= LetrasEspacio(this.value)"required>
</div>
<div class="mb-3">
  <label for="persona" class="form-label">APE_PERSONA</label>
  <input type="text" class="form-control" id="apellido" name="apellido" value= "{{$mostrarArray['APE_PERSONA']}}" placeholder="Ingrese el apellido" onkeyup="convertir('apellido'), this.value= LetrasEspacio(this.value)"required>
</div>
<div class="mb-3">
  <label for="persona" class="form-label">SEXO</label>
  <input type="text" class="form-control" id="sex" name="sex" value= "{{$mostrarArray['SEXO']}}"placeholder="Ingrese el sexo">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">EDAD</label>
  <input type="text" class="form-control" id="edades" name="edades" value= "{{$mostrarArray['EDAD']}}"placeholder="Ingrese la edad">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">EST_CIVIL</label>
  <input type="text" class="form-control" id="estado" name="estado" value= "{{$mostrarArray['EST_CIVIL']}}" placeholder="Ingrese el estado civil">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">TIP_DIRECCION</label>
  <input type="text" class="form-control" id="tipodir" name="tipodir" value= "{{$mostrarArray['TIP_DIRECCION']}}" placeholder="Ingrese el tipo de direccion">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">NOM_DIRECCION</label>
  <input type="text" class="form-control" id="nomdir" name="nomdir" value= "{{$mostrarArray['NOM_DIRECCION']}}"placeholder="Ingrese la direccion">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">TIP_TELEFONO</label>
  <input type="text" class="form-control" id="tipotel" name="tipotel" value= "{{$mostrarArray['TIP_TELEFONO']}}"placeholder="Ingrese el tipo de telefono">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">NUM_TELEFONO</label>
  <input type="text" class="form-control" id="numtel" name="numtel" value= "{{$mostrarArray['NUM_TELEFONO']}}" placeholder="Ingrese el numero de telefono">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">TIP_CORREO</label>
  <input type="text" class="form-control" id="tipocor" name="tipocor" value= "{{$mostrarArray['TIP_CORREO']}}" placeholder="Ingrese el tipo de correo">
</div>
<div class="mb-3">
  <label for="persona" class="form-label">CORREO</label>
  <input type="text" class="form-control" id="correos" name="correos" value= "{{$mostrarArray['CORREO']}}" placeholder="Ingrese el correo">
</div>
      <a href="{{ route('personas.index') }}"  class="btn btn-danger">Cancelar</a>
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