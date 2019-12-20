<?php

namespace App\Http\Controllers;

use App\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentario::all();
        return view('welcome', compact('comentarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('burnquiz.preguntas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $regla = [
            'comentario' => 'string|required'
        ];
     
        $mensaje = [
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comentarios = Comentario::findOrFail($id);
        return view('welcome', compact('comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentarios = Comentario::find($id);
        return view('');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comentario $comentario)
    {
        $comentario = Comentario::find($request);

        $comentario->name = 'comentario';

        $comentario->save();
    }
}
