<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    public $table = 'publicaciones';
    public $guarded = [];

    public function comentar(){
        return $this->hasMany(Comentario::class, 'id_posteo');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'id_user');
    }
}