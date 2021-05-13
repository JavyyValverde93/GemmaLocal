<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rolespermiso extends Model
{
    use HasFactory;
	
	protected $fillable=['id_rol','id_permiso'];
    
	public $timestamps = false;	
	
    
}
