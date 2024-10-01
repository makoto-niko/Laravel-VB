<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;

use DB;
use log;

class PostsController extends Controller
{
    public function index()
    {
        $model = new Post();
        $posts = $model->getPosts();
        $authors = Author::all();
        return view('index', [
            'posts' => $posts,
            'authors' => $authors
        ]);
    }

    public function showCreate()
    {
        $authors = Author::all();
        return view('create', [
            'authors' => $authors
        ]);
    }
}
