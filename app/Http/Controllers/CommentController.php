<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    // Guardar un nuevo comentario para un post
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|max:280',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $post->id,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Comentario agregado');
    }

    // Los demás métodos podés dejarlos vacíos si no los usás
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
