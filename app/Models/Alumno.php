<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Alumno extends Model
{
    use HasFactory;

	protected $fillable=['id','id_usuario','nombre','apellidos','foto','domicilio','poblacion',

						'provincia','pais','codigo_postal','sexo','telefono','telefono2',

						'email','email2','edad','fecha_nacimiento','lugar_nacimiento',

						'nss','fecha_creacion','fecha_dado_baja','observaciones'];

	public $timestamps = false;

	public function User(){
		return $this->belongsTo(User::class);
	}

	public function Tutor(){
		return $this->hasMany(Tutor::class);
	}

	public function Asistencia(){
		return $this->hasMany(Asistencia::class);
	}

	public function Calificacion(){
		return $this->hasMany(Calificacion::class);
	}

	public function Matricula(){
		return $this->hasMany(Matricula::class);
	}

	public function Prescripcion(){
		return $this->hasMany(Prescripcion::class);
	}

	public function scopeNombre($query, $p){
        if($p!=null){
            // \DB es igual a poner use Illuminate\Support\Facades\DB; y DB
            return $query->where(DB::raw("CONCAT(nombre, ' ', apellidos, ' ', email, ' ', telefono, ' ', dni, ' ', id, ' ', domicilio, ' ', poblacion)"), "LIKE", "%$p%");
        }else{
            return $query->where('nombre', "LIKE", "%");
        }
    }
}
