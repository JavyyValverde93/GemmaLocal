<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','id_actividad','especialidad','titulacion'];
    
	public $timestamps = false;	
	
    
}
