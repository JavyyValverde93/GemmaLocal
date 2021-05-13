<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plazoprescripcion extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','fecha'];
    
	protected $table = "plazosprescripciones";

	public $timestamps = false;	
	
}
