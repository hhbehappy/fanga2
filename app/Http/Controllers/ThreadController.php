<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Thread;
use App\Models\Comment;

class ThreadController extends Controller
{
    public function index()
    {
        $threads = Thread::latest()->get();
        $user_id = Auth::id();

        return Inertia::render('Threads/Index', [
            'threads' => $threads,
            'user_id' => $user_id
        ]);
    }

    public function create()
    {
        return Inertia::render('Threads/Create');
    }

    public function show($id)
    {
        $currenturl = url()->current();
        $user_id = Auth::id();

        $comments = Comment::select('comments.id', 'comments.user_id', 'name', 'nickname', 'content', 'comments.updated_at')
        ->where('thread_id', $id)->oldest('updated_at')
        ->leftJoin('users', 'comments.user_id', '=', 'users.id')->get();
        
        $threads = Thread::select('title', 'updated_at')
        ->where('id', $id)->latest('updated_at')->get();

        return Inertia::render('Threads/Show', [
            'threads'       => $threads,
            'comments'      => $comments,
            'id'            => $id,
            'user_id'       => $user_id,
            'currenturl'    => $currenturl
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:126',
            'content' => 'required|string|max:512|min:5',
        ]);
        
        $thread = DB::transaction(function () use ($request) {
            $thread = $request->user()->threads()->create([
                'title' => $request->title,
            ]);
            $thread->comments()->create([
                'content' => $request->get('content'),
                'user_id' => $request->user()->id,
                'nickname'=> $request->get('nickname')
            ]);
            
            return $thread;
        });
    
        return to_route("threads.show", $thread);
    }

    public function destroy($id)
    {
        $thread = Thread::findOrFail($id);
        $thread->delete();
        
        return back()->with([
            'message' => 'スレッドを削除しました。',
            'status'  => 'delete'
        ]);
    }
}
