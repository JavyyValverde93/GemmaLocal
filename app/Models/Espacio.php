<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Espacio extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','capacidad','planta','activo','aula_combinada','turno',
						
						'fecha_creacion','fecha_modificacion'];
	
						public $timestamps = false;	
	
	public function Grupo(){
		return $this->hasMany(Grupo::class);
	}

	public function scopeNombre($query, $p){
        if($p!=null){
            // \DB es igual a poner use Illuminate\Support\Facades\DB; y DB
            return $query->where(DB::raw("CONCAT(nombre, ' ', capacidad, ' ', planta, ' ', id)"), "LIKE", "%$p%");
        }else{
            return $query->where('nombre', "LIKE", "%");
        }
    }
}
