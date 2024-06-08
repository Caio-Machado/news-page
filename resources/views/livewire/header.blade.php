<div>
    <header class="bg-white p-4 shadow-md">
        <nav class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">
                <a href="{{ route('home') }}" class="text-black hover:text-gray-800">Noticias</a>
            </h1>
            @auth
                <div>
                    <span class="text-gray-700">{{ __('Olá, :name', ['name' => Auth::user()->name]) }}</span>
                    <a href="/dashboard" class="text-gray-700 hover:text-gray-900 ml-4">Dashboard</a>
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
