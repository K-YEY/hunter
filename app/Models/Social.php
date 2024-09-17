<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    use HasFactory;

    // Specify the table if it's different from the default 'socials'
    protected $table = 'social';

    // Define the fillable properties
    protected $fillable = [
        'title',
        'icon',
        'link',
        'status'
    ];
}
