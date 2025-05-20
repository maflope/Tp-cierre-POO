<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store(Post $post)
    {
        $user = Auth::user();

        // Evitar duplicados
        if (!$post->likes()->where('user_id', $user->id)->exists()) {
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
        }

        return back();
    }

    public function destroy(Post $post)
    {
        $user = Auth::user();

        $post->likes()->where('user_id', $user->id)->delete();

        return back();
    }
}
