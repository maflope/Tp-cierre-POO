<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            Posteos
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <p>Bienvenido, {{ auth()->user()->name }}.</p>

        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <textarea name="content" rows="3" class="w-full border rounded p-2" placeholder="¿Qué estás pensando?"></textarea>
            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded">Publicar</button>
        </form>

        <hr class="my-4">

        <h3 class="text-lg font-semibold mb-2">Tus posteos</h3>

        @forelse ($posts as $post)
            <div class="border rounded p-4 mb-4">
                <p><strong>{{ $post->user->name }}</strong></p>
                <p>{{ $post->content }}</p>
                <small class="text-gray-500">{{ $post->created_at->diffForHumans() }}</small>

                {{-- Botones de like/unlike acá --}}
                <form action="{{ route('posts.like', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="text-blue-500 underline">Like</button>
                </form>

                <form action="{{ route('posts.unlike', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 underline">Unlike</button>
                </form>
            </div>
        @empty
            <p>No hay posteos todavía.</p>
        @endforelse
    </div>
</x-app-layout>
