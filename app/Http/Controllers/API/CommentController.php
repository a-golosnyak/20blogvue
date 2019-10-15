<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateComment;
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

    /**
     * @param Comment $comment
     * @param UpdateComment $request
     * @return string
     */
    public function update(Comment $comment, UpdateComment $request)
    {
        return response()->json(tap($comment)->update($request->validated()), 202);
        return 'Here!';
        return $comment->update($request->validated());
    }

    /**
     * @param Comment $comment
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Comment $comment)
    {
//        $this->authorize('delete', Comment::class);
        $comment->delete();

        return response('No content', 204);
    }
}
