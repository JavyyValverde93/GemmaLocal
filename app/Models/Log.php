<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
	
	protected $fillable=['id_usuario','accion','fecha_creacion'];
	
	public $timestamps = false;	
	
	public function User(){
		return $this->belongsTo(User::class, 'id_usuario');
	}

	public function scopeAccion($query, $p){
        if($p!=null){
            // \DB es igual a poner use Illuminate\Support\Facades\DB; y DB
            return $query->where(DB::raw("CONCAT(accion, ' ', id_usuario)"), "LIKE", "%$p%");
        }else{
            return $query->where('accion', "LIKE", "%");
        }
    }
}
