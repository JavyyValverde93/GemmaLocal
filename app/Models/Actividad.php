<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = ['nombre',
        'descripcion', 'color', 'estado', 'salidas_profesionales',
        'link_externo', 'id_usuario', 'id_grupo',
        'area_academica', 'total_horas', 'asistencia',
        'anio_academico', 'creditos', 'ciclo_formativo'
    ];

    public $timestamps = false;
    
    public function User(){
        return $this->hasMany(User::class);
    }
	
	public function Categoria(){
		return $this->belongsTo(Categoria::class);
	}
}
