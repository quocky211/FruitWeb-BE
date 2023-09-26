<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'description',
        'price',
    ];

    public function categories()
    {
       return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
