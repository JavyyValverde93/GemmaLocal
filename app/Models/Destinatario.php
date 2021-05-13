<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinatario extends Model
{
    use HasFactory;
	
	protected $fillable=['id_comunicacion','id_usuario','fecha_creacion','fecha_modificacion'];
	
	public $timestamps = false;	
	
	public function Comunicacion(){
		return $this->belongsTo(Comunicacion::class);
	}
	
	public function User(){
		return $this->belongsTo(User::class);
	}
}
