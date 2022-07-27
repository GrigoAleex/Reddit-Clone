<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Create Post Form --}}
            <form action="{{ route('posts.store') }}" method="POST"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                        Title
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="title" type="text" placeholder="Post's title" name="title">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="content">
                        Content
                    </label>
                    <textarea name="content" id="content" class="w-full shadow rounded border"></textarea>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Create post
                    </button>
                </div>
            </form>

            {{-- Posts gallery --}}
            @forelse ($posts as $post)
                <a href="{{ route('posts.show', $post) }}"
                    class="bg-white border p-4 mb-8 shadow rounded w-full flex flex-col">
                    <span class="text-xl uppercase font-bold"> {{ $post->title }} </span>
                    <p class="text-neutral-600"> {{ $post->content }} </p>
                </a>
            @empty
                Nu exista postari!
            @endforelse
        </div>
    </div>
</x-app-layout>
