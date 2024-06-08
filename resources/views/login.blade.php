<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded shadow-md w-full max-w-sm">
            <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>
            <livewire:login-form />
            <p class="mt-4 text-center">
                Não tem uma conta? <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Registre-se</a>
            </p>
        </div>
    </div>
    @livewireScripts
</body>
</html>
