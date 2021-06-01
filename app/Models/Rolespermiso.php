<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolespermiso extends Model
{
    use HasFactory;
	
	protected $fillable=['id_rol','id_permiso'];
    
	public $timestamps = false;	
	
    public function Permiso(){
		return $this->belongsTo(Permiso::class, 'id_permiso');
	}

	public function Rol(){
		return$this->belongsTo(Rol::class, 'id_rol');
	}

}
