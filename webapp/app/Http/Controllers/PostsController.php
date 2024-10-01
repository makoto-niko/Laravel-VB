<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Author;

use DB;
use Log;

class PostsController extends Controller
{
    public function index()
    {
        $model = new Post();
        $posts = $model->getPosts();
        return view('index', compact('posts'));
    }

    public function showCreate()
    {
        $authors = Author::all();
        return view('create', compact('authors'));
    }
    public function storePost(Request $request)
    {
        $model = new Post();

        try {
            DB::beginTransaction();
            $model->storePost($request);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->route('index');
        }

        return redirect()->route('index');
    }

    public function showEdit($id)
    {
        $post = Post::find($id);
        $authors = Author::all();

        return view('show', compact('post', 'authors'));
    }

    public function updatePost($request, $id)
    {
        $posts = self::find($id);
        $posts->title = $request->input('title');
        $posts->author_id = $request->input('author_id');
        $posts->content = $request->input('content');
        $posts->save();
    }

    public function registEdit(Request $request, $id)
    {
        $model = new Post();
        try {
            DB::beginTransaction();
            $model->updatePost($request, $id);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }

    public function deletePost($id)
    {
        $model = new Post();
        try {
            DB::beginTransaction();
            $model->deletePost($id);
            DB::commit();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            return redirect()->route('index');
        }
        return redirect()->route('index');
    }
}
