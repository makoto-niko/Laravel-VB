<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Author;
use Illuminate\Support\Facades\DB;
use \Symfony\Component\HttpFoundation\Response;

class RemotePostController extends Controller
{
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $post = Post::create($request->all());

            DB::commit();

            return response()->json(['message' => 'success post', 'data' => $post], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
