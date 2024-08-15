<?php

namespace App\Models;

use App\Models\Admin\CommonType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    // Define the fillable attributes
    protected $fillable = [
        'file',
        'type',
    ];

    // Define the relationship with the CommonType model
    public function commonTypes()
    {
        return $this->hasMany(CommonType::class, 'icon_id');
    }
}
