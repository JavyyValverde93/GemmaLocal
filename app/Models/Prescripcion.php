<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescripcion extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','id_actividad','fecha_creacion','id_plazoprescripcion'];
    
	protected $table = "prescripciones";

	public $timestamps = false;	
	
    
}
