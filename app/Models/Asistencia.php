<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;
	
	protected $fillable=['id_alumno','id_grupo','justificada','foto','ausente','fecha_creacion','fecha_modificacion'];
	
	public $timestamps = false;	
	
	public function Alumno(){
		return $this->belongsTo(Alumno::class);
	}
	
	public function Grupo(){
		return $this->belongsTo(Grupo::class);
	}
}
