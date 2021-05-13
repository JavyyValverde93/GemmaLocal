<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','accion','fecha_creacion'];
	
	public $timestamps = false;	
	
	public function User(){
		return $this->belongsTo(User::class);
	}
}
