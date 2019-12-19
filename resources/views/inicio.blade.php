@extends('layouts.app')

@section('titulo')
Inicio
@endsection

@section('content')
            <div class="content">
                <div>
                    <h1>Noticias</h1>
                    <div>
                        <form action="{{ route('publicar') }}" enctype="multipart/formdata" method="post">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" id="posteo" name="posteo" cols="60" rows="3" value="{{ old('posteo') }}" placeholder="¿Cual es la nueva noticia?" ></textarea>
                                <input type="file" name="imagen" id="imagen">
                            </div>
                            <button type="submit" class="btn btn-secondary">Publicar</button>
                        </form>
                        <ul>
                        @foreach($publicaciones as $publicacion)
                            <li>
                            <a href="/detalle/{{$publicacion->id}}">{{$publicacion['posteo']}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            <div>            
        </div>
@endsection
