<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Webelieve extends Model
{
    use HasFactory;
	 protected $fillable = [
        'photo',
		'photo2',
		'details'
    ];
}
