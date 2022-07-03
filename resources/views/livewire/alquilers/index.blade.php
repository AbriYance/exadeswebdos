@extends('adminlte::page')

@section('title', 'Alquileres')

@section('content_header')
    <h1>Alquileres</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('alquilers')
        </div>     
    </div>   
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop