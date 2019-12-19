@extends('layouts.app')

@section('titulo')
Publicacion
@endsection

@section('content')
<div class="container">
    <div class="row">

    <div class="col-lg-8">
        
    <h1 class="mt-4">{{$publicacion->titulo}}</h1>

    <p>{{$publicacion->updated_at}}</p>

    <img class="img-fluid rounded" src="/storage/{{$publicacion->imagen}}" alt="imagen de noticia">
    
    <hr>

    {{$publicacion->posteo}}
    <hr>


    <div class="card my-4">
        <h5 class="card-header">Dejá tu comentario:</h5>
            <div class="card-body">
                <form action="{{ route('comentar') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$publicacion->id}}">
                    <textarea class="form-control" name="comentario" rows="3" value="{{ old('comentario') }}" placeholder="¿Que queres comentar?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comentar</button>
                </form>
            </div>
    </div>
    @foreach($publicacion->comentar as $comentario)

        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
            <h5 class="mt-0">{{ Auth::user()->name }}</h5>
            {{$comentario->comentario}}
            {{$comentario->updated_at}}
            </div>
        </div>
    @endforeach


@endsection