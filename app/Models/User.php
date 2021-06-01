<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Alumno(){
        return $this->hasMany(Alumno::class);
    }
	
	public function Destinatario(){
		return $this->hasMany(Destinatario::class);
	}
	
	public function Comunicacion(){
		return $this->hasMany(Comunicacion::class);
	}
	
	public function Log(){
		return $this->hasMany(Log::class);
	}

    public function Facturacion(){
        $this->hasMany(Facturacion::class);
    }

    public function Rol(){
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
