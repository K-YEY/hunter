<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_id',
        'education_id',
        'is_job',
        'is_remote',
        'hear_us',
        'resume',
        'profile',
        'status',
        'ip',
    ];

    // If needed, you can define relationships for `country_id` and `education_id`
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function education()
    {
        return $this->belongsTo(Constant::class);
    }
}
