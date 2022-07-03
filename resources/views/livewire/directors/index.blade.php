@extends('adminlte::page')

@section('title', 'Directores')

@section('content_header')
    <h1>Directores</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @livewire('directors')
        </div>     
    </div>   
</div>
@endsection@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop