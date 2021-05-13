<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = ['id_alumno','nombre','relacion','dni','telefono','direccion'];

	protected $table = "titulaciones";

	public $timestamps = false;	
	
    public function Alumno(){
        return $this->belongsTo(Alumno::class);
    }
}
