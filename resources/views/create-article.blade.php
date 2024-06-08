<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Artigo</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <livewire:header />
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Criar Artigo</h1>
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('article.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block mb-2">Título</label>
                <input type="text" id="title" name="title" class="border border-gray-300 rounded px-4 py-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2">Conteúdo</label>
                <textarea name="description" id="description" rows="6" class="border border-gray-300 rounded px-4 py-2 w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-2">Imagem</label>
                <input type="file" id="image" name="image" class="border border-gray-300 rounded px-4 py-2 w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Enviar</button>
        </form>
    </div>
</body>
</html>
