<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','capacidad','planta','activo','aula_combinada','turno',
						
						'fecha_creacion','fecha_modificacion'];
	
						public $timestamps = false;	
	
	public function Grupo(){
		return $this->hasMany(Grupo::class);
	}
}
