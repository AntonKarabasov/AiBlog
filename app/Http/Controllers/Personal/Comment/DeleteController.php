<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Comment;

class DeleteController extends BaseController
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('personal.comment.index');
    }
}
