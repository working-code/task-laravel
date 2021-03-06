<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    public static function isAdmin()
    {
        if (Auth::id() === self::getIdAdmin()) {
            return true;
        }
        return false;
    }

    public static function getRole()
    {
        if (Role::isAdmin()) {
            return 'admin';
        }
        return 'user';
    }
}
