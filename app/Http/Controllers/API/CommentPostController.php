<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

/**
 * Class CommentPostController
 * @package App\Http\Controllers\API
 */
class CommentPostController extends Controller
{
    public function index(Post $post) {
        $comment = Comment::where(['post_id'=>$post->id])->with('user')->get();
        return $comment;
    }
}
