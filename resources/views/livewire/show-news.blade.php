<div>
    <div>
        <input type="text" name="Busca" id="searchString" wire:model.live="searchString">
        <button wire:click="searchArticles">Buscar</button>
    </div>
    <hr>
    @foreach ($articles as $article)
        <h2>{{ $article->title }}</h2>
        <h3>Autor: {{ $article->author->name }}</h3>
        <h3>{{ $article->image }}</h3>
        <p>{{ $article->description }}</p>
        <hr>
    @endforeach
</div>
