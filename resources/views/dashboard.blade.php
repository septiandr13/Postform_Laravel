<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="text-gray-500 dark:text-gray-400">Total Users</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['users'] }}</div>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="text-gray-500 dark:text-gray-400">Total Posts</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['posts'] }}</div>
                </div>
                <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="text-gray-500 dark:text-gray-400">Total Categories</div>
                    <div class="text-3xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['categories'] }}</div>
                </div>
            </div>

            <div class="p-6 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">5 Post Terbaru</h3>
                    <a href="{{ route('posts.index') }}" class="text-indigo-600 hover:underline">Lihat semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm">
                        <thead class="border-b font-medium dark:text-gray-100">
                            <tr>
                                <th class="px-3 py-2">Judul</th>
                                <th class="px-3 py-2">Kategori</th>
                                <th class="px-3 py-2">Penulis</th>
                                <th class="px-3 py-2">Dibuat</th>
                            </tr>
                        </thead>
                        <tbody class="dark:text-gray-200">
                            @foreach($latestPosts as $post)
                                <tr class="border-b">
                                    <td class="px-3 py-2">{{ $post->title }}</td>
                                    <td class="px-3 py-2">{{ $post->category->name }}</td>
                                    <td class="px-3 py-2">{{ $post->user->name }}</td>
                                    <td class="px-3 py-2">{{ $post->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                            @if($latestPosts->isEmpty())
                                <tr><td class="px-3 py-4" colspan="4">Belum ada data</td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
