<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $regla = [
            'max' => 'El campo :attribute tiene un maximo de :max',
            'comentario' => 'string|required|max:3000'
        ];
     
        $mensaje = [
            'max' => 'El campo :attribute tiene un maximo de :max caracteres',
            'string' => 'El campo :attribute tiene que ser un texto',
            'required' => 'El campo :attribute es requerido'
        ];

        $this->validate($request, $regla, $mensaje);
        $comentario = new Comentario;
        $comentario->id_usuario = $request->id_usuario;
        $comentario->comentario = $request->comentario;
        $comentario->id_posteo = $request->id_publicacion;
        $comentario->save();

        return redirect()->route('mostrar', ['id' => $request->id_publicacion]); 
    }
}