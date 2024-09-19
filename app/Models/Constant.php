<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    use HasFactory;
    protected $table = 'constant';

    protected $fillable = ['content', 'type'];
    /**
     * Get a constant value by key.
     *
     * @param string $key
     * @return string|null
     */
    public static function get($type)
    {
        return self::where('type', $type)
                    ->value('content');
    }
}
