@extends('layouts.app')

@section('titulo')
Editando
@endsection

@section('content')
<div class="container">

    <div class="row">
    <div class="card my-4">
        <h5 class="card-header">¿Qué necesitas modificar?</h5>
            <div class="card-body">
              <form action="{{ route('editar') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="id" value="{{$publicacion->id}}">  
                    <input type="text" name="titulo" value="{{ $publicacion->titulo }}" placeholder="Tìtulo">
                    <textarea class="form-control" id="posteo" name="posteo" cols="100" rows="3" value="{{ old('posteo') }}">{{$publicacion->posteo}}</textarea>
                    <input type="file" name="imagen" id="imagen" value="{{$publicacion->imagen}}">
                </div>
                <button type="submit" class="btn btn-primary">Modificar</button>
              </form>
            </div>
    </div>
    </div>
</div>
@endsection