@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-2 mb-2">
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
            <div class="card">
                <div class="card-header text-center">{{ __('Editar tipo: '.$type->name) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/types/update/'.$type->id) }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-9">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $type->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-3 col-form-label text-md-right">{{ __('Descripcion') }}</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description', $type->description) }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <img class="img-fluid img-thumbnail" src="{{ $type->url_image }}" alt="">
                            </div>
                            <div class="col-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Imagen del tipo</h5>
                                        <div class="custom-file text-left">
                                            <input type="file" name="image" value="{{ old('photo') }}" class="custom-file-input" id="validatedCustomFile" lang="es">
                                            <label class="custom-file-label" for="validatedCustomFile">Seleccionar...</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-0 mt-1">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ url('admin/types') }}" type="reset" class="btn btn-primary">
                                    {{ __('Volver') }}
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar cambios') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
