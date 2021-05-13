<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservaespacio extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','id_grupo','id_usuario','id_espacio','fecha_inicio','fecha_fin'];
    
	protected $table = "reservasespacios";

	public $timestamps = false;	
	
}
