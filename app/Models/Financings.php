<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financings extends Model
{
     protected $fillable = [
        'name',
		'maxamount',
		'interest',
		'months',
		'dealer'
    ];
	use HasFactory;
}
