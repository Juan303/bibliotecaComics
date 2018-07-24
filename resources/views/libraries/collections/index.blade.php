@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Colecciones</h1>
    </div>
    <div class="row justify-content-center">
        <h3 class="text-muted">{{ $library->name }}</h3>
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
        <a href="{{ url('/collections/create/'.$library->id) }}" class="btn btn-success">Registrar coleccion</a>
    </div>
    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Colección</th>
                    <th>Descripcion</th>
                    <th>Tipo</th>
                    <th>Categorias</th>
                    <th>Numeros</th>
                    <th>Visibilidad</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach($collections as $collection)
                <tr>
                    <td><img src="{{ $collection->url_image }}" alt="" width="60px"></td>
                    <td><a href="">{{ $collection->name }}</a></td>
                    <td>{{ $collection->description }}</td>
                    <td>{{ $collection->tipo }}</td>
                    <td>
                        @foreach($collection->collection_categories as $collection_category)
                            <span class="badge badge-primary">{{ $collection_category->category->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ count($collection->numbers) }}</td>
                    <td>
                        @if($collection->visibility=='1')
                            si
                        @else
                            no
                        @endif
                    </td>
                    <td>
                         <form action="{{ url('collections/'.$collection->id) }}" method="post" class="form-inline">
                            {{ csrf_field() }} <!-- es equivalente a <input type="hidden" name="_token" value="csrf_token" /> -->
                            {{ method_field('DELETE') }} <!-- es equivalente a <input type="hidden" name="_method" value="DELETE" /> -->
                            <a href="{{ url('collections/edit/'.$collection->id) }}"  rel="tooltip" title="Editar" class="btn btn-link px-1 text-info px-0 my-0 py-0">
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
    <div class="row text-center">
        <div class="col-12">
            <a href="{{ url('/home') }}" class="btn btn-primary">
                {{ __('Volver') }}
            </a>
        </div>
    </div>
</div>
@endsection
