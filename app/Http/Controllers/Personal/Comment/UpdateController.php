<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

class UpdateController
{
    /**
     * @throws \Throwable
     */
    public function __invoke(UpdateRequest $request, Comment $comment): RedirectResponse
    {
        $data = $request->validated();
        $comment->update($data);

        return redirect()->route('personal.comment.index', compact('comment'));
    }
}
