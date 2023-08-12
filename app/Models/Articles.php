<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'banner',
        'summary',
        'content',
        'keyword',
        'status',
    ];


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
