<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">Edit Post</h1>
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="/posts/{{ $post->id }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" name="title" value="{{ $post->title }}" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" />
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">Content</label>
                    <textarea name="body" rows="6" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $post->body }}</textarea>
                </div>
                <div class="flex justify-between">
                    <a href="/" class="text-gray-500 hover:text-gray-700">← Back</a>
                    <button type="submit" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600">Update</button>
                    @if($errors->any())
                <div class="bg-red-100 text-red-600 rounded p-3 mb-4">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</body>
</html>