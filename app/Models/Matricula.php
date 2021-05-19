<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
	
	protected $fillable=['id_alumno','id_grupo','fecha_creacion','id_prescripcion'];

	public $timestamps = false;	
	

	public function Alumno(){
		return $this->belongsTo(Alumno::class, 'id_alumno');
	}

	public function Grupo(){
		return $this->belongsTo(Grupo::class, 'id_grupo');
	}

	public function Plazomatricula(){
		return $this->belongsTo(Plazomatricula::class, 'id_plazomatricula');
	}

	public function Prescripcion(){
		return $this->belongsTo(Prescripcion::class, 'id_prescripcion');
	}
}
