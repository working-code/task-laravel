<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public static function getName(int $id)
    {
        return Categorie::query('name')->find($id)->name;
    }
}
