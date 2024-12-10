<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibattery extends Model
{
    use HasFactory;
	protected $fillable = [
        'details',
		'photo'
    ];
}
