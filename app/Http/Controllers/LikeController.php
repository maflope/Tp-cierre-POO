<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Alterna un «Like».
     * Si el usuario ya le dio like al post, lo quita.
     * Si aún no, crea el like.
     */
    public function toggle(Post $post)
    {
        $user = auth()->user();

        // ¿Existe ya un like de este usuario para este post?
        $existing = Like::where('post_id', $post->id)
                        ->where('user_id', $user->id)
                        ->first();

        if ($existing) {
            // Ya tenía like ➜ eliminar
            $existing->delete();
            $message = 'Like removido';
        } else {
            // No tenía like ➜ crear
            Like::create([
                'post_id' => $post->id,
                'user_id' => $user->id,
            ]);
            $message = 'Like agregado';
        }

        return back()->with('success', $message);
    }
}
