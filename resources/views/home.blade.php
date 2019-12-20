@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido!!!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Estas adentro!! :D
                    
                    <br>
                    <hr>
                    <a href="{{route('inicio')}}"><button type="button" class="btn btn-primary">Gracias</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
