<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescripcion extends Model
{
    use HasFactory;
	
	protected $fillable=['id_alumno','id_actividad','fecha_creacion','id_plazoprescripcion'];
    
	protected $table = "prescripciones";

	public $timestamps = false;	

	public function Alumno(){
		return $this->belongsTo(Alumno::class, 'id_alumno');
	}
	
	public function Actividad(){
		return $this->belongsTo(Actividad::class, 'id_actividad');
	}

	public function Plazoprescripcion(){
		return $this->belongsTo(Plazoprescripcion::class, 'id_plazoprescripcion');
	}

	public function Matricula(){
		return $this->hasMany(Matricula::class);
	}
	
    
}
