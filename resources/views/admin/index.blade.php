@extends('adminlte::page')



@section('title', 'Dasboard')

@section('content_header')
    <h1>Santa Monica</h1>
    <h1>Mariscos y Carnes</h1>
@stop

@section('content')

 <div class="card">
    <div class="card-header">
        <h1 class="card-tittle">Informacion General</h1>
    <div>
    
    <div class="card-body">
        <p>Somos una empresa especializada en la comercialización de mariscos y cortes de carnes de la mas alta calidad, donde encuentras una amplia gama de productos frescos.Contamos con la suficiente experiencia y conocimiento para garantizar a nuestros cliente un estricto control de todos los procesos de selección de nuestros producto.</p>
    <div>

@Stop

@section('footer')
<footer class="main-footer">
<strong>Copyright &copy <a href="https://www.facebook.com/santamonicamariscosycarnes/?locale=es_LA">Santa Monica Marisco y Carnes</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
<b>Version</b> 1.0.0
</div>
</footer>

<aside class="control-sidebar control-sidebar-dark">

</aside>

</div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop