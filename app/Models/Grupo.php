<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','nombre','id_espacio','fecha_creacion','fecha_modificacion'];
	
	public $timestamps = false;	
	
	public function Asistencia(){
		return $this->hasMany(Asistencia::class);
	}
	
	public function Calificacion(){
		return $this->hasMany(Calificacion::class);
	}
	
	public function Espacio(){
		return $this->belongsTo(Espacio::class);
	}
}
