<div>
    <header class="bg-white p-4 shadow-md">
        <nav class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">
                <a href="{{ route('home') }}" class="text-black hover:text-gray-800">Noticias</a>
            </h1>
            @auth
                <div class="flex items-center">
                    <span class="text-gray-700 mr-4">{{ __('Olá, :name', ['name' => Auth::user()->name]) }}</span>
                    <a href="{{ route('createArticle') }}" class="px-4 py-2 font-semibold text-white bg-green-500 rounded-md shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 transition ease-in-out duration-150">
                        Criar Notícia
                    </a>
                    <a wire:click.prevent="logout" href="#" class="text-gray-700 hover:text-gray-900 ml-4">Logout</a>
                </div>
            @else
                <div>
                    <a href="/login" class="text-blue-500 hover:underline">Login</a>
                    <a href="/register" class="ml-4 text-blue-500 hover:underline">Registro</a>
                </div>
            @endauth
        </nav>
    </header>
</div>
