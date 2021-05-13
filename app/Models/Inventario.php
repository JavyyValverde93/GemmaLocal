<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','datos','fecha_creacion','fecha_modificacion'];
	
	public $timestamps = false;	
	
	public function Prestamo(){
		return $this->hasMany(Prestamo::class);
	}
}
