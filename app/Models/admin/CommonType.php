<?php

namespace App\Models\Admin;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommonType extends Model
{
    use HasFactory;


    // Specify the table if it's not the plural form of the model
    protected $table = 'common_type';

    // Define the fillable attributes
    protected $fillable = [
        'title',
        'icon_id',
    ];

    // Define the relationship with the Image model

    public function icon()
    {
        return $this->belongsTo(Image::class, 'icon_id');
    }
    public function service()
    {
        return $this->hasOne(Service::class, 'type_id');
    }

}

