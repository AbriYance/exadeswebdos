@extends('adminlte::page')

@section('title', 'Historial de Alquiler')

@section('content_header')
    <h1>Historial de Alquiler</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('alquilersocios')
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