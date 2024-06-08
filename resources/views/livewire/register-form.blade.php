<form wire:submit.prevent="register">
    <div class="mb-4">
        <label for="name" class="block text-gray-700">Nome:</label>
        <input type="text" id="name" wire:model="name" class="mt-1 block w-full border-gray-300 rounded shadow-sm" required>
        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email:</label>
        <input type="email" id="email" wire:model="email" class="mt-1 block w-full border-gray-300 rounded shadow-sm" required>
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700">Senha:</label>
        <input type="password" id="password" wire:model="password" class="mt-1 block w-full border-gray-300 rounded shadow-sm" required>
        @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700">Confirme a Senha:</label>
        <input type="password" id="password_confirmation" wire:model="password_confirmation" class="mt-1 block w-full border-gray-300 rounded shadow-sm" required>
        @error('password_confirmation') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>
    <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Registrar</button>
</form>
