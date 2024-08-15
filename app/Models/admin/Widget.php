<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Widget extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model
    protected $table = 'widget';

    // Define the fillable attributes
    protected $fillable = [
        'key',
        'value',
    ];

    // Define the casting for the value field
    protected $casts = [
        'value' => 'array',  // Cast the JSON field to an array
    ];
}
