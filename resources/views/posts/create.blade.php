<!DOCTYPE html>
<html>
<head>
    <title>New Post</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold text-gray-800 mb-8">New Post</h1>
        <div class="bg-white rounded-lg shadow p-6">
            <form method="POST" action="/posts" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Title</label>
                    <input type="text" name="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Post title" />
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Content</label>
                    <textarea name="body" rows="6" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" placeholder="Write your post..."></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-semibold mb-2">Image (optional)</label>
                    <input type="file" name="image" id="imageInput" class="w-full border rounded px-3 py-2" accept="image/*" />
                    <img id="imagePreview" src="" class="mt-3 rounded-lg max-h-48 object-cover hidden" />
                </div>
                @if($errors->any())
                    <div class="bg-red-100 text-red-600 rounded p-3 mb-4">
                        @foreach($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div class="flex justify-between">
                    <a href="/" class="text-gray-500 hover:text-gray-700">← Back</a>
                    <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">Publish</button>
                </div>
            </form>
        </div>
    </div>
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
</body>
</html>