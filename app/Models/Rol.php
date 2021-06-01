<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre'];
    
	public $timestamps = false;	

	protected $table = 'roles';

	public function Rolespermiso(){
		return $this->hasMany(Rolespermiso::class);
	}

	public function User(){
		return $this->hasMany(User::class);
	}
	
}
