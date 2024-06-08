<div>
    <div class="mt-8 px-4 py-2 bg-gray-100 rounded shadow-md">
        <div class="flex items-center">
            <input type="text" name="Busca" id="searchString" wire:model.live="searchString" class="flex-grow px-4 py-2 mr-2 leading-tight bg-white border border-gray-300 rounded shadow-md focus:outline-none focus:border-blue-500">
            <button wire:click="searchArticles" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded shadow-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Buscar</button>
        </div>
        <hr class="my-4">
    </div>
    <ul class="mt-8 flex flex-wrap -mx-4">
        @foreach ($articles as $article)
            <li class="w-full md:w-1/2 lg:w-1/3 px-4">
                <div class="bg-white p-4 shadow-md rounded h-full">
                    <a href="/article/{{ $article->id }}" class="block">
                        <div class="mb-4">
                            <img src="public/images/{{ $article->image }}" alt="Imagem do artigo" class="w-full h-48 object-cover rounded">
                        </div>
                        <h2 class="text-lg font-semibold">{{ $article->title }}</h2>
                    </a>
                    <h3 class="text-lg font-semibold">Autor: {{ $article->author->name }}</h3>
                    <p class="text-gray-700 overflow-hidden overflow-ellipsis" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical;">
                        {{ $article->description }}
                    </p>
                    @if ($article->author->name == Auth::user()->name)
                        <div class="flex mt-2">
                            <div class="px-4 py-2 mr-4 text-red-500 cursor-pointer hover:text-red-700 border border-red-500 rounded-md" wire:click="deleteArticle({{ $article->id }})">
                                Deletar
                            </div>
                            <div class="px-4 py-2 text-blue-500 cursor-pointer hover:text-blue-700 border border-blue-500 rounded-md" wire:click="editArticle({{ $article->id }})">
                                Editar
                            </div>
                        </div>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
    <div class="mt-8 flex justify-center">
        <nav class="inline-flex shadow-sm">
            @foreach ($paginationLinks as $link)
                @if ($link['url'] == null)
                    <span class="px-4 py-2 bg-gray-200 border border-gray-300 text-gray-500 cursor-not-allowed">
                        @if ($link['label'] == '&laquo; Previous')
                            &#x2190; Previous
                        @elseif ($link['label'] == 'Next &raquo;')
                            Next &#x2192;
                        @else
                            {{ $link['label'] }}
                        @endif
                    </span>
                @else
                    <a href="{{ $link['url'] }}" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 hover:bg-gray-100 {{ $link['active'] ? 'bg-blue-500 text-white' : '' }}">
                        @if ($link['label'] == '&laquo; Previous')
                            &#x2190; Previous
                        @elseif ($link['label'] == 'Next &raquo;')
                            Next &#x2192;
                        @else
                            {{ $link['label'] }}
                        @endif
                    </a>
                @endif
            @endforeach
        </nav>
    </div>
</div>
