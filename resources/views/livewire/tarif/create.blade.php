<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    <form>
        <div>
            <x-label for="exampleFormControlx-input1">Tarif description</x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlx-input1" wire:model="tar_description" />
            @error('tar_description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="exampleFormControlx-input2">Tarif ero</x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlx-input2" wire:model="tar_ero" />
            @error('tar_ero')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <x-button wire:click.prevent="store()" class="mt-4">Save</x-button>
    </form>
</x-auth-card>
