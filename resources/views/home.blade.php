@extends('layouts.app')

@section('styles')
    
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center mb-4">
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
        @foreach($libraries as $library)
        <div class="col-12 col-lg-4 mb-2">
            <div class="card h-100">
                <div class="card-header">
                    <form action="{{ url('libraries/'.$library->id) }}" method="post" class="text-right">
                        {{ csrf_field() }} <!-- es equivalente a <input type="hidden" name="_token" value="csrf_token" /> -->
                        {{ method_field('DELETE') }} <!-- es equivalente a <input type="hidden" name="_method" value="DELETE" /> -->
                        <a href="{{ url('libraries/edit/'.$library->id) }}"  rel="tooltip" title="Editar" class="btn btn-link px-1 text-info px-0 my-0 py-0">
                            <i class="fa fa-edit"></i>
                        </a>
                        <button type="submit" rel="tooltip" title="Eliminar" class="btn px-1 btn-link text-danger my-0 py-0">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>
                </div>
                <div style="height:140px; overflow-y:hidden">
                    <img class="card-img-top img-fluid" style="object-fit:cover" src="{{ $library->url_image }}" alt="Imagen de {{ $library->name }}">
                </div>
                
                <div class="card-body">
                    <h3 class="card-title"><a href="{{ url('collections/'.$library->id) }}">{{ $library->name }}</a></h3>
                    <p class="card-text">{{ $library->description }}</p>
                </div>
                <div class="card-footer">
                    <p class="text-muted mb-0">@if(count($library->collections) != 1) {{ count($library->collections) }} colecciones @else {{ count($library->collections) }} colección @endif</p>
                </div>
            </div> 
        </div>  
        
        @endforeach
        <div class="col-12 col-lg-4 mb-2">
            <div class="card h-100">
                <a style="white-space:normal;" class="p-0 d-block btn btn-success w-100 h-100" href="{{ url('/libraries/create') }}">
                    
                        <h1 class="mt-5">Crear nueva biblioteca</h1>

                </a>
            </div>
        </div>
        
            
 
       
    </div>

</div>
@endsection
