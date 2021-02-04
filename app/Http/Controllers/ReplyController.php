<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{
    Reply
    };

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        try {

            $reply = $request->all();
            $reply['user_id'] = 1;

            $thread = App\Thread::find($request->thread_id);
            $thread->replies()->create($reply);

            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back();
        }
    }
}
