<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'name',
        'email',
        'company_name',
        'country',       
        'message',
        'schedule',
        'zoom_link',
        'status',
        'ip',
    ];

    protected $casts = [
        'schedule' => 'datetime',
    ];

    /**
     * Get the country name by the country code stored in the 'country' attribute.
     */
    public function getCountryNameAttribute()
    {
        $countries = json_decode(File::get(storage_path('app/public/countries.json')), true);

        $country = collect($countries)->firstWhere('code', $this->country);

        return $country ? $country['name'] : null;
    }
}
