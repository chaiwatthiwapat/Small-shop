<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'detail',
        'price',
        'image',
        'subimage',
    ];


    protected $casts = [
        'subimage' => 'array',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}

