<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Inventario extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','datos','fecha_creacion','fecha_modificacion'];
	
	protected $table = "inventario";

	public $timestamps = false;	
	
	public function Prestamo(){
		return $this->hasMany(Prestamo::class);
	}

	public function scopeNombre($query, $p){
        if($p!=null){
            // \DB es igual a poner use Illuminate\Support\Facades\DB; y DB
            return $query->where(DB::raw("CONCAT(nombre, ' ', datos)"), "LIKE", "%$p%");
        }else{
            return $query->where('nombre', "LIKE", "%");
        }
    }
}
