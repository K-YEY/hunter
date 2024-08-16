<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Career extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'email',
        'phone',
        'country_code',
        'education',
        'is_job',
        'is_remote',
        'hear_us',
        'resume',
        'profile',
        'status',
        'ip',
    ];

    // If needed, you can define relationships for `country_id` and `education_id`
    public function getCountryNameAttribute()
    {
        $countries = json_decode(File::get(storage_path('app/public/countries.json')), true);

        $country = collect($countries)->firstWhere('code', $this->country_code);

        return $country ? $country['name'] : null;
    }

}
