<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicacion extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','mensaje','fecha_creacion','fecha_modificacion'];
	
	protected $table = "comunicaciones";

	public $timestamps = false;	
	
	public function User(){
		return $this->belongsTo(User::class);
	}
}
