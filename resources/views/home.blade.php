@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Mis bibliotecas</h1>
    </div>
    @if(session('notification'))
        @if(session('error')==false)
            <div class="alert alert-success mt-4">
                {{ session('notification') }}
            </div>
        @else
            <div class="alert alert-warning mt-4">
                {{ session('notification') }}
            </div>
        @endif
    @endif
    <div class="row">
        <a href="{{ url('/libraries/create') }}" class="btn btn-success">Registrar biblioteca</a>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Biblioteca</th>
                    <th>Colecciones</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($libraries as $library)
                <tr>
                    <td><img src="{{ $library->url_image }}" alt="" width="60px"></td>
                    <td><a href="{{ url('collections/'.$library->id) }}">{{ $library->name }}</a></td>
                    <td>{{ count($library->collections) }}</td>
                    <td>{{ $library->description }}</td>
                    <td>
                         <form action="{{ url('libraries/'.$library->id) }}" method="post" class="form-inline">
                            {{ csrf_field() }} <!-- es equivalente a <input type="hidden" name="_token" value="csrf_token" /> -->
                            {{ method_field('DELETE') }} <!-- es equivalente a <input type="hidden" name="_method" value="DELETE" /> -->
                            <a href="{{ url('libraries/edit/'.$library->id) }}"  rel="tooltip" title="Editar" class="btn btn-link px-1 text-info px-0 my-0 py-0">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" rel="tooltip" title="Eliminar" class="btn px-1 btn-link text-danger my-0 py-0">
                                <i class="fa fa-times"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
