<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-10 px-4">
        <div class="flex justify-between items-center mb-8">
          <form method="GET" action="/" class="mb-6">
        <div class="flex gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search posts..." class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
          </div>
          </form>
            <h1 class="text-4xl font-bold text-gray-800">My Blog</h1>
            <a href="/posts/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">+ New Post</a>
        </div>
        @foreach($posts as $post)
          @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="w-full rounded-lg mb-3 object-cover max-h-40" />
        @endif
            <div class="bg-white rounded-lg shadow p-6 mb-4">
                <h2 class="text-2xl font-semibold text-gray-700">
                    <a href="/posts/{{ $post->id }}" class="hover:text-blue-500">{{ $post->title }}</a>
                </h2>
                <p class="text-gray-400 text-sm mt-1">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
    </div>
</body>
</html>