<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

/**
 * Class PostController
 * @package App\Http\Controllers\API
 */
class PostController extends Controller
{
    /**
     * @return Post[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * @param $id
     * @return Post
     */
    public function show($id)
    {
//        return $post;

        $post = Post::where('id', $id)->get();
        return $post;
    }
}
