<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Admin\Post\BaseController;
use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        $user = auth()->user();
        $user->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
}
