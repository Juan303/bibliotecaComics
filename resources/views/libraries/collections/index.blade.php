@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Colecciones de la biblioteca...</h1>
        
    </div>
    <div class="row">
        <a href="{{ url('/register_library') }}" class="btn btn-success">Registrar Coleccion</a>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Coleccion</th>
                    <th>Numeros</th>
                    <th>Tipo</th> 
                    <th>Categoria</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($libraries as $library)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
