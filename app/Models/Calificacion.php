<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    use HasFactory;

	protected $fillable=['id_alumno','id_actividad','id_grupo','id_periodocalificacion','nota'];

	protected $table = "calificaciones";

	public $timestamps = false;

	/*public function Alumno(){
		return $this->belongsTo(Alumno::class);
	}*/

	public function Actividad(){
		return $this->belongsTo(Actividad::class);
	}

	public function Grupo(){
		return $this->belongsTo(Alumno::class);
	}

	public function Periodocalificacion(){
		return $this->belongsTo(Periodocalificacion::class);
	}
}
