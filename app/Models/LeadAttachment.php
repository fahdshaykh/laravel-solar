<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadAttachment extends Model
{
    use HasFactory;
    protected $fillable = [
        'leads_id',
        'file_name',
        'file_type',
        'file_path',
        'file_size'
    ];

    
}
