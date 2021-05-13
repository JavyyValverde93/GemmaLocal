<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','id_grupo','fecha_creacion','id_prescripcion'];

	public $timestamps = false;	
	

}
