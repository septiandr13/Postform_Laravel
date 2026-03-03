<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Posts</h2>
            <a href="{{ route('posts.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Buat Post</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead class="border-b font-medium dark:text-gray-100">
                            <tr>
                                <th class="px-3 py-2">Judul</th>
                                <th class="px-3 py-2">Kategori</th>
                                <th class="px-3 py-2">Dibuat</th>
                                <th class="px-3 py-2"></th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-200">
                            @foreach($posts as $post)
                                <tr class="border-b">
                                    <td class="px-3 py-2">{{ $post->title }}</td>
                                    <td class="px-3 py-2">{{ $post->category->name }}</td>
                                    <td class="px-3 py-2">{{ $post->created_at->format('d M Y') }}</td>
                                    <td class="px-3 py-2 space-x-2">
                                        <a href="{{ route('posts.show', $post) }}" class="text-indigo-600 hover:underline">Detail</a>
                                        <a href="{{ route('posts.edit', $post) }}" class="text-green-600 hover:underline">Edit</a>
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-600 hover:underline" onclick="return confirm('Hapus?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            @if($posts->isEmpty())
                                <tr><td class="px-3 py-4" colspan="4">Belum ada data</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
