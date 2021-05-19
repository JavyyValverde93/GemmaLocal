<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre',
        'descripcion', 'color', 'estado', 'salidas_profesionales',
        'link_externo', 'id_profesor', 'id_grupo',
        'area_academica', 'total_horas', 'asistencia',
        'anio_academico', 'creditos', 'ciclo_formativo'
    ];

	protected $table = "actividades";

    public $timestamps = false;
    
    public function User(){
        return $this->hasMany(User::class);
    }
	
	public function Categoria(){
		return $this->belongsTo(Categoria::class);
	}

    public function Profesor(){
        return $this->belongsTo(Profesor::class, 'id_profesor');
    }

    public function Prescripcion(){
        return $this->hasMany(Prescripcion::class);
    }
    
    public function Grupo(){
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function Titulacion(){
        return $this->hasMany(Titulacion::class);
    }
}
