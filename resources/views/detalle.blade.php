@extends('layouts.app')

@section('titulo')
Publicacion
@endsection

@section('content')
{{$publicacion['posteo']}}

<form action="{{ route('comentar') }}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$publicacion->id}}">
    <br>
    <textarea class="form-control" name="comentario" cols="30" rows="1" value="{{ old('comentario') }}" placeholder="¿Que queres comentar?" ></textarea>
    <br>
    <button type="submit" class="btn btn-primary">Comentar</button>
</form>

@foreach($publicacion->comentar as $comentario)
<br>
<li id="comentario">{{$comentario->comentario}}</li>
<li id="fecha">{{$comentario->updated_at}}</li>
@endforeach

@endsection