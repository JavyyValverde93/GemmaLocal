<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre'];
	
	public $timestamps = false;	
	
	public function Rol(){
		return $this->belongsToMany(Permiso::class, 'id_rol');
	}
}
