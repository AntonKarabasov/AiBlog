<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Post $post): RedirectResponse
    {
        try {
            $data = $request->validated();
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $post->update($data);
            $post->tags()->sync($tagIds);
        } catch (\Throwable $th) {
            throw $th;
        }

        return redirect()->route('admin.post.show', compact('post'));
    }
}
