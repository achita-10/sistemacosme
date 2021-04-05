<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;
    protected $table = 'actividades';
    protected $fillables = ['Descripcion','Titulo','Categoria','Fecha','Status','Id_user'];
    public $timestamps =false;
}