<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'content',
        'type',
    ];
}
