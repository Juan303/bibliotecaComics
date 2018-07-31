@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Registrar coleccion</h1>
    </div>
    <div class="row justify-content-center">
        <h3 class="text-muted">{{ $library->name }}</h3>
    </div>
    <form method="POST" action="{{ url('collections/'.$library->id) }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
       @csrf
        <div class="row">    
            <div class="col-lg-6 col-12">
                 <div class="form-group">
                    <label for="name" class="text-md-right pl-1">{{ __('Nombre:') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description" class="text-md-right pl-1">{{ __('Descripcion:') }}</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description') }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="visibility" class="text-md-right pl-1">{{ __('Visibilidad:') }}</label>
                    <select class="custom-select" name="visibility" id="visibility">
                        <option value="1">si</option>
                        <option value="0">no</option>
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
                    <label for="type" class="text-md-right pl-1">{{ __('Tipo:') }}</label>
                    <select class="custom-select" name="type" id="type">
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="form-group">
                    <div>
                        <label for="type" class="text-md-right pl-1">{{ __('Categorias:') }}</label> 
                        @if ($errors->has('categories'))
                            <span class="text-danger" role="alert">
                                <i>({{ $errors->first('categories') }})</i>
                            </span>
                        @endif
                    </div>
                    @foreach($categories as $category)
                    <div class="custom-control custom-checkbox custom-control-inline">
                          <input name="categories[]" @if(is_array(old('categories')) && in_array($category->id, old('categories'))) checked @endif value="{{ $category->id }}" type="checkbox" class="custom-control-input" id="customCheck_{{ $category->id }}">
                          <label class="custom-control-label" for="customCheck_{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="editorial" class="text-md-right pl-1">{{ __('Editorial:') }}</label>
                    <select class="custom-select" name="editorial" id="editorial">
                        @foreach($editorials as $editorial)
                            <option value="{{ $editorial->id }}">{{ $editorial->name }}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="form-group">
                    <label for="name" class="text-md-right pl-1">{{ __('Números:') }}</label>
                    <input id="numbers" type="number" class="form-control" name="numbers" placeholder="Total de números de la colección" value="{{ old('numbers') }}" required>
                    @if ($errors->has('numbers'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('numbers') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image" class="text-md-right pl-1">{{ __('Imagen:') }}</label>
                    <div class="custom-file text-left">
                        <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="validatedCustomFile"  lang="es">
                        <label class="custom-file-label" for="validatedCustomFile">Seleccionar...</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <div class="form-group">
                    <a href="{{ url('collections/'.$library->id) }}" class="btn btn-primary">
                        {{ __('Volver') }}
                    </a>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Siguiente') }}
                    </button>
                </div>
            </div>
        </div>
     </form>
</div>

@endsection
