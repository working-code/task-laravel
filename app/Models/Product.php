<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'categories_id',
        'price',
        'img1',
        'description'
    ];

    public static function getPathDirImg()
    {
        return realpath($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . env('PATH_IMG'));
    }

    public function getPathImg()
    {
        return env('APP_URL') . '/' . env('PATH_IMG') . DIRECTORY_SEPARATOR . $this->img1;
    }
}
