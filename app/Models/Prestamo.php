<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','id_inventario','fecha_prevista_devolucion','importe_fianza',
						
						'concepto_fianza','observaciones','fecha_creacion','fecha_modificacion'];
	
						public $timestamps = false;	
	
	public function User(){
		return $this->belongsTo(User::class, 'id_usuario');
	}
	
	public function Inventario(){
		return $this->belongsTo(Inventario::class, 'id_inventario');
	}
}
