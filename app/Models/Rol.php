<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $fillables = ['Nombre','Descripcion','Condicion'];
    public $timestamps =false;

    //un rol puede tener varios usuarios
    public function users(){
        return $this->hasMany('App\User');
    }
}
