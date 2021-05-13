<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plazomatricula extends Model
{
    use HasFactory;
	
	protected $fillable=['nombre','fecha'];

	public $timestamps = false;	
	
}
