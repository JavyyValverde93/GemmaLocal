<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferenciahorario extends Model
{
    use HasFactory;
	
	protected $fillable=['tipo','id_usuario','dia','hora_inicio','hora_fin','fecha_creacion',
						
						'fecha_modificacion'];
						
	public $timestamps = false;	
	
	
}
