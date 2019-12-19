<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    public $table = 'comentarios';
    public $guarded = [];

    public function publicar(){
        return $this->belongsTo(Publicacion::class, 'id_publicacion');
    }
}