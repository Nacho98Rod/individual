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

    <img class="img-fluid rounded" src="/storage/{{$publicacion->imagen}}" alt="Imagen de noticia">
    
    <hr>

    {{$publicacion->posteo}}
    @guest

    @else
    <hr>
    @if(Auth::user()->role =='admin')
    <a href="/publicacion/editar/{{$publicacion->id}}"><button type="button" class="btn btn-warning btn-sm">Modificar</button></a>
    <a href="/publicacion/eliminar/{{$publicacion->id}}"><button type="button" class="btn btn-danger btn-sm">Eliminar</button></a>
    @endif
    <div class="card my-4">
        <h5 class="card-header">Dejá tu comentario:</h5>
            <div class="card-body">
                <form action="{{ route('comentar') }}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id_usuario" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="id_publicacion" value="{{$publicacion->id}}">
                    <label for="comentario">Comentario:</label>
                    <textarea class="form-control" name="comentario" id="comentario" rows="3" value="{{ old('comentario') }}" placeholder="¿Que queres comentar?"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Comentar</button>
                </form>
                <div class="media mb-4">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
    </div>
    @endguest
    @foreach($publicacion->comentar as $comentario)

        <div class="media mb-4">
            <div class="media-body">
            <h5 class="mt-0">{{$comentario->user->name}} {{$comentario->user->surname}} dice:</h5>
            <p>{{$comentario->comentario}}</p>
            <p>{{$comentario->created_at}}</p>
            </div>
        </div>
        <hr>
        <br>
    @endforeach

@endsection