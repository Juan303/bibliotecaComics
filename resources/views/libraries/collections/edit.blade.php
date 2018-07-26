@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Editar coleccion "{{ $collection->name }}"</h1>
    </div>
    <div class="row justify-content-center">
        <h3 class="text-muted">{{ $collection->library->name }}</h3>
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
    <form method="POST" action="{{ url('collections/update/'.$collection->id) }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
       @csrf
        <div class="row">    
            <div class="col-lg-6 col-12">
                 <div class="form-group">
                    <label for="name" class="text-md-right pl-1">{{ __('Nombre') }}</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $collection->name) }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="description" class="text-md-right pl-1">{{ __('Descripcion') }}</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description', $collection->description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
                
                <div class="form-group">
                    <label for="visibility" class="text-md-right pl-1">{{ __('Visibilidad') }}</label>
                    <select class="custom-select" name="visibility" id="visibility">
                        <option @if($collection->visibility == 1) selected @endif value="1">SI</option>
                        <option @if($collection->visibility == 0) selected @endif value="0">NO</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="form-group">
                    <label for="type" class="text-md-right pl-1">{{ __('Tipo') }}</label>
                    <select class="custom-select" name="type" id="type">
                        @foreach($types as $type)
                            <option @if($type->id == $collection->type->id) selected @endif  value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                 <div class="form-group">
                    <div>
                        <label for="type" class="text-md-right pl-1">{{ __('Categorias') }}</label> 
                        @if ($errors->has('categories'))
                            <span class="text-danger" role="alert">
                                <i>({{ $errors->first('categories') }})</i>
                            </span>
                        @endif
                    </div>
                    @foreach($categories as $category)
                    <div class="custom-control custom-checkbox custom-control-inline">
                          <input name="categories[]" @if($collection->has_category($category->id)) checked @endif value="{{ $category->id }}" type="checkbox" class="custom-control-input" id="customCheck_{{ $category->id }}">
                          <label class="custom-control-label" for="customCheck_{{ $category->id }}">{{ $category->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="image" class="text-md-right pl-1">{{ __('Imagen') }}</label>
                    <div class="custom-file text-left mb-2">
                        <input type="file" name="image" value="{{ old('image') }}" class="custom-file-input" id="validatedCustomFile"  lang="es">
                        <label class="custom-file-label" for="validatedCustomFile">Seleccionar...</label>
                    </div>
                    <img class="img-fluid img-thumbnail" width="30%" src="{{ $collection->url_image }}" alt="">
                </div>
                
            </div>
        </div>
        <div class="row justify-content-center text-center">
            <div class="col-12">
                <div class="form-group">
                    <a href="{{ url('collections/'.$collection->library->id) }}" class="btn btn-primary">
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
