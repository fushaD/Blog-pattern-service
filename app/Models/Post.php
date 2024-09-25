<?php

namespace App\Models;

use \App\Models\Comment;
use \App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'slug', 'user_id', 'category', 'tags', 'is_published', 'published_at', 'views', 'featured_image', 'excerpt', 'reading_time', 'likes', 'shares', 'metadata'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
