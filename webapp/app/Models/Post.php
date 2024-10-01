<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'author_id', 'content'];

    public function getPosts()
    {
        $posts = self::join('authors', 'posts.author_id', '=', 'authors.id')
            ->select('posts.*', 'authors.author_name')
            ->get();

        return $posts;
    }
}
