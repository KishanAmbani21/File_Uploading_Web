<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'Title',
        'Description',
        'image',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
