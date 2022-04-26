<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    <form>
        <div>
            <x-label for="exampleFormControlInput1">Parcelle lieu</x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlInput1" wire:model="emp_lieu" />
            @error('emp_lieu')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="exampleFormControlInput2">Parcelle nom </x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlInput2" wire:model="par_nom" />
            @error('par_nom')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="exampleFormControlInput3">Parcelle superficie</x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlInput3" wire:model="par_superficie" />
            @error('par_superficie')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="tarif" class="block mt-3 mb-1 font-medium text-sm text-gray-700">Parcelle prop</x-label>
            <select name="tarif" id="tarif" style="width: 100%;" wire:model="par_prop"
                class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
                <option value=""> </option>
                @foreach ($agr as $value)
                    <option value={{ $value->agr_id }}>{{ $value->agr_id }}</option>
                @endforeach
            </select>
            @error('par_prop')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <x-button wire:click.prevent="update()" class="mt-4">Update</x-button>
        <x-button wire:click.prevent="cancel()" class="mt-4 text-sm text-gray bg-red-400 rounded">Cancel</x-button>
    </form>
</x-auth-card>
