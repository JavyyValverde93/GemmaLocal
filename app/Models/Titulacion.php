<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;
	
	protected $fillable=['id_profesor','id_actividad','especialidad','titulacion'];
    
	protected $table = "titulaciones";

	public $timestamps = false;	
	
    public function Profesor(){
		return $this->belongsTo(Profesor::class, 'id_profesor');
	}

	public function Actividad(){
		return $this->belongsTo(Actividad::class, 'id_actividad');
	}
}
