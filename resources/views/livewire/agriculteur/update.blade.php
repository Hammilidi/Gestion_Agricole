<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    <form>
        <div class="form-group">
            <x-label for="exampleFormControlInput1">Agriculteur nom</x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlInput1" wire:model="agr_nom" />
            @error('agr_nom')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <x-label for="exampleFormControlInput2">Agriculteur prenom </x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlInput2" wire:model="agr_prn" />
            @error('agr_prn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <x-label for="exampleFormControlInput3">Agriculteur Residance</x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlInput3" wire:model="agr_resid" />
            @error('agr_resid')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <x-button wire:click.prevent="update()" class="mt-4">Update</x-button>
        <x-button wire:click.prevent="cancel()" class="mt-4 text-sm text-gray bg-red-400 rounded">Cancel</x-button>
    </form>
</x-auth-card>
