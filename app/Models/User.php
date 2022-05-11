<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'fullname'
    ];

    public function journeys()
    {
        return $this->hasMany(Journey::class);
    }
}
