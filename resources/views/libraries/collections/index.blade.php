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

        <div class="col-4 col-lg-3 mb-2">
            <div class="card h-100" style="min-height:300px">
                <a style="white-space:normal;" class="p-0 d-block btn btn-warning w-100 h-100" href="{{ url('/collections/create/'.$library->id) }}">
                    <h1 class="mt-5">Crear nueva colección</h1>
                </a>
            </div>
        </div>
        @foreach($collections as $collection)
        <div class="col-4 col-lg-3 mb-2">
            <div class="card h-100">
                <div class="card-header">
                    <form action="{{ url('collections/'.$collection->id) }}" method="post" class="text-right d-flex">
                        {{ csrf_field() }} <!-- es equivalente a <input type="hidden" name="_token" value="csrf_token" /> -->
                        {{ method_field('DELETE') }} <!-- es equivalente a <input type="hidden" name="_method" value="DELETE" /> -->
                        <div class="mr-auto">
                            @if($collection->visibility=='1') <span><i class="fas fa-eye text-primary"></i></span> @else <span><i class="fas fa-eye-slash text-muted"></i></span> @endif 
                        </div>
                        <div class="ml-auto">
                            <a href="{{ url('collections/edit/'.$collection->id) }}"  rel="tooltip" title="Editar" class="btn btn-link px-1 text-info px-0 my-0 py-0">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button type="submit" rel="tooltip" title="Eliminar" class="btn px-1 btn-link text-danger my-0 py-0">
                                <i class="fa fa-times"></i>
                            </button>
                       </div>
                       
                    </form>
                </div>
                <div style="height:140px; overflow-y:hidden">
                    <img class="card-img-top img-fluid" style="object-fit:cover" src="{{ $collection->url_image }}" alt="Imagen de {{ $collection->name }}">
                </div>
                
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ url('collections/'.$collection->id) }}">{{ $collection->name }}</a></h5>
                    <p class="card-text">{{ $collection->description }}</p>
                    @foreach($collection->collection_categories as $collection_category)
                        <span class="badge badge-primary">{{ $collection_category->category->name }}</span>
                    @endforeach
                </div>
                <div class="card-footer">
                    <p class="text-muted mb-0">@if(count($collection->numbers) != 1) {{ count($collection->numbers) }} numeros @else {{ count($collection->numbers) }} numero @endif</p>
                </div>
            </div> 
        </div>  
        @endforeach
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
