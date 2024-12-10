<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solarvaluessetting extends Model
{
    use HasFactory;
	
	protected $fillable = [
        'panelcapacity',
		'paneloutput',
		'dctoac',
		'costperpanel',
		'taxincentive',
		'kwhrate',
		'homevaluefactor'
    ];
}
