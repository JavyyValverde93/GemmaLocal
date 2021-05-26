<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grupo extends Model
{
    use HasFactory;
	
	protected $fillable=['id_profesor','nombre','id_espacio','fecha_creacion','fecha_modificacion'];
	
	public $timestamps = false;	
	
	public function Asistencia(){
		return $this->hasMany(Asistencia::class);
	}
	
	public function Calificacion(){
		return $this->hasMany(Calificacion::class);
	}
	
	public function Espacio(){
		return $this->belongsTo(Espacio::class, 'id_espacio');
	}

	public function Profesor(){
		return $this->belongsTo(Profesor::class, 'id_profesor');
	}

	public function Actividad(){
		return $this->hasMany(Actividad::class);
	}

	public function Matricula(){
		return $this->hasMany(Matricula::class);
	}

	public function scopeNombre($query, $p){
        if($p!=null){
            // \DB es igual a poner use Illuminate\Support\Facades\DB; y DB
            return $query->where(DB::table('grupos')->raw("CONCAT(nombre, id)"), "LIKE", "%$p%");
        }else{
            return $query->where('nombre', "LIKE", "%");
        }
    }

}
