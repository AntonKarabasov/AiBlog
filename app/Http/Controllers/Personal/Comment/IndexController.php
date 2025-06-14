<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $comments = $user->comments;

        return view('personal.comment.index', compact('comments'));
    }
}
