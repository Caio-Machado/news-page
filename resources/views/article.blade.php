<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }}</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <livewire:header />
    <main class="container mx-auto p-4">
        <article class="max-w-screen-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <img src="{{ $article->getImageUrl() }}" alt="Imagem do Artigo" class="w-full h-64 object-cover mb-4 rounded-lg">
            <h2 class="text-2xl font-bold mb-4">{{ $article->title }}</h2>
            <p class="text-gray-600 mb-4">Publicado em {{ $article->created_at->format('d/m/Y') }}</p>
            <div class="prose max-w-none">
                {!! nl2br(e($article->description)) !!}
            </div>
        </article>
    </main>
</body>
</html>
