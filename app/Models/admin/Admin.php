<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admin';  // Ensure your database table name is correct

    protected $fillable = [
        'name',
        'username',
        'password',
        'image',
        'cover',
    ];

    protected $hidden = [
        'password',
    ];

    /**
     * Mutator to hash the password before saving it to the database.
     *
     * @param  string  $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
    // explode(' ', $this->attributes['name'])[0];
}
