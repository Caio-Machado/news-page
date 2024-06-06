<div>
    @foreach ($articles as $article)
        <h2>{{ $article->title }}</h2>
        <h3>Autor: {{ $article->author->name }}</h3>
        <h3>{{ $article->image }}</h3>
        <p>{{ $article->description }}</p>
        <hr>
    @endforeach
</div>
