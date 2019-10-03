<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $commentValidated = $request->validate([
            'user_id' => 'required|integer',
            'post_id' => 'required|integer',
            'body'  => 'required|string',
        ]);

//        return $commentValidated;

        return Comment::create($commentValidated);
    }
}
