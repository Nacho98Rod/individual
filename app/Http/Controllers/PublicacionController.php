<?php

namespace App\Http\Controllers;

use DB;
use App\Publicacion;

use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicaciones = DB::table('publicaciones')->paginate(5);
        
        return view('inicio', compact('publicaciones'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'titulo' => 'string|unique:publicaciones,titulo',   
            'posteo' => 'string|min:3|max:500',
            'imagen' => 'image'
        ];

        $mensajes = [
            'string' => 'El campo :attribute tiene que ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'image' => 'El campo :attribute debe ser una imagen',
            'unique' => 'El campo :attribute esta repetido'
        ];

        $this->validate($request, $reglas, $mensajes);

        $publicacion = new Publicacion;
        $path = $request->file('imagen')->store('public');
        $nombreImagen = basename($path);
        $publicacion->imagen = $nombreImagen;
        $publicacion->titulo = $request->titulo;
        $publicacion->posteo = $request->posteo;
        $publicacion->save();

        return redirect('/inicio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('detalle', compact('publicacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        return view('editar', compact('publicacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $reglas = [
            'titulo' => 'string|unique:publicaciones,titulo',   
            'posteo' => 'string|min:3|max:500',
            'imagen' => 'image'
        ];

        $mensajes = [
            'string' => 'El campo :attribute tiene que ser un texto',
            'min' => 'El campo :attribute tiene un minimo de :min',
            'max' => 'El campo :attribute tiene un maximo de :max',
            'image' => 'El campo :attribute debe ser una imagen',
            'unique' => 'El campo :attribute esta repetido'
        ];

        $this->validate($request, $reglas, $mensajes);

        $publicacion = Publicacion::findOrFail($request->id);
        $path = $request->file('imagen')->store('public');
        $nombreImagen = basename($path);
        $publicacion->imagen = $nombreImagen;
        $publicacion->titulo = $request->titulo;
        $publicacion->posteo = $request->posteo;
        $publicacion->save();

        return redirect('inicio');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Publicacion::destroy($id);
        return redirect('inicio');
    }
}
