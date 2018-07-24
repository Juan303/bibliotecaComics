@extends('layouts.app')

@section('content')
<div class="container">
   
    <div class="row">
        <div class="col-12 col-lg-5">
            <h1>Inicio</h1>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos repellendus, recusandae iste, blanditiis exercitationem alias distinctio earum quis doloremque soluta ea iusto magnam consequuntur veritatis, molestiae quaerat? Dolor, perferendis perspiciatis. Praesentium fugiat eius laudantium unde cupiditate dolores officia quod, cumque quos excepturi earum explicabo dignissimos asperiores. Repudiandae neque a et.</p>
            <p>Tan solo necesitas <a href="{{ route('register') }}" class="text-info">registrarte</a> para crear tus bibliotecas y tener un control de tus colecciones asi como de los números que tienes y los que te faltan. ¡Adelante!</p>
        </div>
        <div class="col-12 col-lg-7">
            <img src="{{ asset('images\web\portada\01.jpg') }}" class="img-fluid rounded" alt="">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <h2>Bibliotecas destacadas</h2>
        </div>
        <div class="col-lg-4">
        
        </div>
        <div class="col-lg-4">

        </div>
        <div class="col-lg-4">
        
        </div>
    </div>
</div>

@endsection