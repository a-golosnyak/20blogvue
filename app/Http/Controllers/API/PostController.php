<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePost;
use App\Http\Requests\UpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;

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
        return Post::orderByDesc('created_at')->get();
    }

    /**
     * @param Post $post
     * @return Post
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * @param CreatePost $request
     * @return mixed
     */
    public function store(CreatePost $request)
    {
        $post = Post::create($request->validated());
        return $post;
    }

    /**
     * @param Post $post
     * @param UpdatePost $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Post $post, UpdatePost $request)
    {
        return response()->json(tap($post)->update($request->validated()), 202);
    }

    /**
     * @param Post $post
     * @return Post
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response('No content', 204);
    }
}
