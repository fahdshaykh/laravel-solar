<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'qualification',
        'short_description',
        'long_description',
        'languages',
        'city',
        'contact_number',
        'secondary_contact',
        'address',
    ];

   public function sect(){
    return $this->hasOne(Denomination::class,'id','denomination');
   }
}
