<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plazomatricula extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','fecha'];

	protected $table = "plazosmatriculas";

	public $timestamps = false;	
	
}
