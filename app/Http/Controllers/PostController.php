<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Mostrar todos los posteos
    public function index()
    {
        // Traemos los posts con su usuario, comentarios y likes para mostrar
        $posts = Post::with('user', 'comments', 'likes')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Mostrar formulario para crear nuevo posteo (opcional)
    public function create()
    {
        return view('posts.create');
    }

    // Guardar nuevo post
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:280',
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post creado');
    }

    // Mostrar un post específico
    public function show(Post $post)
    {
        $post->load('user', 'comments.user', 'likes');
        return view('posts.show', compact('post'));
    }

    // Los demás métodos podés dejarlos vacíos por ahora
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
