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
        'list_of_text',
        'text_highlight_desc',
        'text_highlight_list',
        'title',
        'sub_title',
        'desc',
        'status',
    ];

    // Define the relationship with the Image model
    public function cover()
    {
        return $this->belongsTo(Image::class, 'cover_id');
    }

    // If there is a Type model associated with `type_id`, define the relationship
    public function type()
    {
        return $this->belongsTo(CommonType::class, 'type_id');
    }
}
