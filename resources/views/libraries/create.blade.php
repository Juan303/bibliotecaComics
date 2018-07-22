@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Registrar biblioteca</h1>
        
    </div>
    <div class="row">
       <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Registrar nueva biblioteca') }}</div>
                
                <div class="card-body">
                    <form method="POST" action="{{ url('register_library') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripcion') }}</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="4">{{ old('description') }}</textarea>

                                
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Siguiente >>') }}
                                </button>
                                <button type="reset" class="btn btn-primary">
                                    {{ __('Reset') }}
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
