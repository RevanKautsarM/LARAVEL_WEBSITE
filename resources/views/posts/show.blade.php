<!DOCTYPE html>
<html>
<head>
    <title>{{ $post->title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
        <div class="mb-4">
          <label class="block text-gray-700 font-semibold mb-2">Image (optional)</label>
          <input type="file" name="image" id="imageInput" class="w-full border rounded px-3 py-2" accept="image/*" />
          <img id="imagePreview" src="" class="mt-3 rounded-lg max-h-48 object-cover hidden" />
      </div>
    <div class="max-w-2xl mx-auto py-10 px-4">
        <div class="bg-white rounded-lg shadow p-6">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $post->title }}</h1>
            <p class="text-gray-400 text-sm mb-4">{{ $post->created_at->diffForHumans() }}</p>

            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="w-full rounded-lg mb-6 object-cover max-h-64" />
            @endif

            <p class="text-gray-700 leading-relaxed mb-8">{{ $post->body }}</p>

            <div class="flex justify-between items-center">
                <a href="/" class="text-gray-500 hover:text-gray-700">← Back</a>
                <div class="flex gap-3">
                    <a href="/posts/{{ $post->id }}/edit" class="bg-yellow-400 text-white px-4 py-2 rounded hover:bg-yellow-500">Edit</a>
                    <form method="POST" action="/posts/{{ $post->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '';
            preview.classList.add('hidden');
        }
    });
</script>
</html>