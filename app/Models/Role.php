<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public static function getIdAdmin()
    {
        return Role::query()->where('name', '=', 'Admin')->first()->id;
    }

    public static function getIdUder()
    {
        return Role::query()->where('name', '=', 'User')->first()->id;
    }
}
