<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Detail Post</h2>
            <div class="space-x-2">
                <a href="{{ route('posts.index') }}" class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 rounded">Kembali</a>
                <a href="{{ route('posts.edit', $post) }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Edit</a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ $post->title }}</h3>
                <div class="text-sm text-gray-600 dark:text-gray-300 mb-6">
                    <span>Kategori: {{ $post->category->name }}</span>
                    <span class="mx-2">•</span>
                    <span>Penulis: {{ $post->user->name }}</span>
                    <span class="mx-2">•</span>
                    <span>{{ $post->created_at->format('d M Y H:i') }}</span>
                </div>
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
