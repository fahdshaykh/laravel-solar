<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $fillable = [
        'photo',
		'assigned_to',
		'first_name',
		'last_name',
		'company',
		'title',
		'email',
		'phone',
		'website',
		'status',
		'source',
		'street',
		'city',
		'state',
		'country',
		'zipcode',
		'description',
		'created_by'
    ];
	
	use HasFactory;
	
	 public function projectdetails(){
        return $this->belongsTo(Osprojects::class,'id','lead_id');
    }

	public function attachments(){
		return $this->hasMany(LeadAttachment::class);
	}
}
