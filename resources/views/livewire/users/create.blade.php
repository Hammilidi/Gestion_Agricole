<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    <form>
        <div>
            <x-label for="1name">User name</x-label>
            <x-input class="mt-1 w-full" type="text" id="1name" wire:model="name" />
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="role">User role </x-label>
            <select name="role" id="role" style="width: 100%;" wire:model="role"
                class="mt-1 block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
                <option value=""> </option>
                <option value="admin"> Admin </option>
                <option value="editor"> Editor </option>
                <option value="viewer"> Viewer </option>
            </select>
            @error('role')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="email">User email</x-label>
            <x-input class="mt-1 w-full" type="email" id="email" wire:model="email" />
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="pass">User password</x-label>
            <x-input class="mt-1 w-full" type="password" id="pass" wire:model="password" />
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <x-button wire:click.prevent="store()" class="mt-4 text-sm text-gray bg-green-300 rounded">Save</x-button>
    </form>
</x-auth-card>
