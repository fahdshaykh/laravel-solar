<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposalfront extends Model
{
     protected $fillable = [
        
        'inputaddress',
		'sunshine',
		'roofarea',
		'maxpanel',
        'co2',
        'panelcount',
		'yenergy',
		'city',
        'zip',
		'state',
		'country',
		'lati',
		'longi',
		'elect_bill',
		'housetype',
		'housecat',
		'roof',
		'first_name',
		'last_name',
		'phone',
		'email',
		'sts',
		'system_size',
		'system_cost',
		'savings',
		'tax_incentive',
		'home_value',
		'without_solar',
		'monthly',
		'final_status'
		
    ];
	
	use HasFactory;
}
