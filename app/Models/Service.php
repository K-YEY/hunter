<?php

namespace App\Models;
use App\Models\Admin\CommonType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'type_id',
        'cover_id',
        'title',
        'desc',
        'status',
    ];

    // Define the relationship with the Image model
    public function coverImage()
    {
        return $this->belongsTo(Image::class, 'cover_id');
    }

    // If there is a type model, define the relationship
    public function type()
    {
        return $this->belongsTo(CommonType::class, 'type_id');
    }
}
