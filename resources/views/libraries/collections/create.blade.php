@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Registrar coleccion</h1>
    </div>
    <div class="row justify-content-center">
        <h3 class="text-muted">{{ $library->name }}</h3>
    </div>
    <form method="POST" action="{{ url('register_library') }}" aria-label="{{ __('Register') }}">
    <div class="row">
        
            <div class="col-lg-6 col-12">
                 <div class="form-group">
                    <label for="name" class="text-md-right pl-1">{{ __('Nombre') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description" class="text-md-right pl-1">{{ __('Descripcion') }}</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image" class="text-md-right pl-1">{{ __('Imagen') }}</label>
                    <div class="custom-file text-left">
                        <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="validatedCustomFile"  lang="es">
                        <label class="custom-file-label" for="validatedCustomFile">Seleccionar...</label>
                    </div>
                    @if ($errors->has('description'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="visibility" class="text-md-right pl-1">{{ __('Visibilidad') }}</label>
                    <select class="custom-select" name="visibility" id="visibility">
                        <option value="si">SI</option>
                        <option value="no">NO</option>
                    </select>
                    @if ($errors->has('visibility'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('visibility') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="type" class="text-md-right pl-1">{{ __('Tipo') }}</label>
                    <select class="custom-select" name="type" id="type">
                        <option value="si">SI</option>
                        <option value="no">NO</option>
                    </select>
                    @if ($errors->has('type'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('type') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <div class="form-group">
                    <a href="{{ url('libraries/edit/'.$library->id) }}" class="btn btn-primary">
                        {{ __('Volver') }}
                    </a>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Siguiente >>') }}
                    </button>
                </div>
            </div>
        </div>
     </form>
</div>

@endsection
