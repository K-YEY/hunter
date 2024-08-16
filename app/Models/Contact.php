<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'email',
        'company_name',
        'country',
        'message',
        'schedule',
        'zoom_link',
        'ip',
    ];

    // If needed, define the casting for specific fields
    protected $casts = [
        'schedule' => 'datetime',
    ];
}
