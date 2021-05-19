<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plazomatricula extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','fecha_inicio', 'fecha_fin'];

	protected $table = "plazosmatriculas";

	public $timestamps = false;	

	public function Matricula(){
		return $this->hasMany(Matricula::class);
	}
	
}
