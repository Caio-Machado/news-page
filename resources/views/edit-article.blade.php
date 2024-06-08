<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Artigo</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100">
    <livewire:header />
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Editar Noticias</h1>
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif
        <form action="{{ route('article.edit', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="title" class="block mb-2">Título</label>
                <input type="text" id="title" name="title" value="{{ $article->title }}" class="border border-gray-300 rounded px-4 py-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2">Conteúdo</label>
                <textarea name="description" id="description" rows="6" class="border border-gray-300 rounded px-4 py-2 w-full" required>{{ $article->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-2">Imagem</label>
                <input type="file" id="image" name="image" value="{{ $article->getImageUrl() }}" class="border border-gray-300 rounded px-4 py-2 w-full">
            </div>
            <div class="flex items-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mr-4">Salvar</button>
                <form action="{{ route('article.delete', $article->id) }}" method="POST" class="inline-block">
                    @csrf
                    @method('delete')
                    <button type="submit" class="px-4 py-2 text-red-500 cursor-pointer hover:text-red-900 border border-red-500 rounded-md">
                        Deletar
                    </button>
                </form>
            </div>
        </form>
    </div>
    @livewireScripts
</body>
</html>
