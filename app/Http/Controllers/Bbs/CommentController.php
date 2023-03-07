<?php

namespace App\Http\Controllers\Bbs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string|max:512|min:5'
        ]);
        
        Comment::create([
            'content'   => $request->get('content'),
            'user_id'   => $request->user()->id,
            'thread_id' => $id,
            'nickname'  => $request->get('nickname')
        ]);
        
        return back()->with([
            'message' => 'コメントを送信しました。',
            'status'  => 'store'
        ]);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        
        return back()->with([
            'message' => 'コメントを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
