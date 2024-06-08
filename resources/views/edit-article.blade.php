<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artigo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-semibold mb-6">Editar Artigo</h1>
        <form method="POST" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Título:</label>
                <input type="text" id="title" name="title" value="{{ $article->title }}" class="w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500">
            </div>

            <div class="mb-4">
                <label for="author" class="block text-gray-700 font-bold mb-2">Autor:</label>
                <input type="text" id="author" name="author" value="{{ $article->author->name }}" class="w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500" readonly>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Descrição:</label>
                <textarea id="description" name="description" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500">{{ $article->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700 font-bold mb-2">Imagem:</label>
                <input type="file" id="image" name="image" class="w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500">
                <img src="public/images/{{ $article->image }}" alt="Imagem do artigo" class="mt-4 h-48 w-full object-cover rounded">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-bold mb-2">Conteúdo:</label>
                <textarea id="content" name="content" rows="10" class="w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:outline-none focus:border-blue-500">{{ $article->content }}</textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded shadow-md hover:bg-blue-600 focus:outline-none">Salvar Alterações</button>
            </div>
        </form>
    </div>
</body>
</html>
