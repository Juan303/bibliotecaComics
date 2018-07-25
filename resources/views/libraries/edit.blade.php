


@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Editar Biblioteca</h1>
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
    <form method="POST" action="{{ url('libraries/update/'.$library->id) }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
       @csrf
        <div class="row">    
            <div class="col-lg-6 col-12">
                 <div class="form-group">
                    <label for="name" class="text-md-right pl-1">{{ __('Nombre') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $library->name) }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description" class="text-md-right pl-1">{{ __('Descripcion') }}</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description', $library->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-12">       
                <div class="form-group">
                    <label for="image" class="text-md-right pl-1">{{ __('Imagen') }}</label>
                    <div class="custom-file text-left">
                        <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="validatedCustomFile"  lang="es">
                        <label class="custom-file-label" for="validatedCustomFile">Seleccionar...</label>
                    </div>
                    <img class="img-fluid img-thumbnail" src="{{ $library->url_image }}" alt="">
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <div class="form-group">
                   <a href="{{ url('/home') }}" class="btn btn-primary">
                        {{ __('Volver') }}
                    </a>
                   <button type="submit" class="btn btn-primary">
                        {{ __('Guardar') }}
                    </button>
                   
                </div>
            </div>
        </div>
     </form>
</div>

@endsection


