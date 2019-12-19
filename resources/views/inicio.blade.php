@extends('layouts.app')

@section('titulo')
inicio
@endsection

@section('content')
  <div class="container">

    <div class="row">
    <div class="card my-4">
        <h5 class="card-header">¿Cuál es la nueva noticia?</h5>
            <div class="card-body">
              <form action="{{ route('publicar') }}" enctype="multipart/form-data" method="post">
                @csrf
                <div class="form-group">
                <input type="text" name="titulo" value="{{ old('titulo') }}" placeholder="Tìtulo">
                <textarea class="form-control" id="posteo" name="posteo" cols="100" rows="3" value="{{ old('posteo') }}" placeholder="¿Cual es la nueva noticia?" ></textarea>
                <input type="file" name="imagen" id="imagen">
              </div>
                <button type="submit" class="btn btn-primary">Publicar</button>
              </form>
            </div>
    </div>


      <div class="col-lg-8">
      @foreach($publicaciones as $publicacion)

      <h1 class="mt-4" id="titulo"><a href="/detalle/{{$publicacion->id}}">{{$publicacion->titulo}}</a></h1>

        <p>{{$publicacion->updated_at}}</p>

        <img class="img-fluid rounded" src="/storage/{{$publicacion->imagen}}" alt="imagen de noticia">

        <hr>

        @endforeach

  

        {{ $publicaciones->links() }}



      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@endsection