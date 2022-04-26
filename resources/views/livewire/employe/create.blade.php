<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    <form>
        <div>
            <x-label for="exampleFormControlInput1">Employe nss</x-label>
            <x-input type="text" class="block mt-1 w-full" id="exampleFormControlInput1" wire:model="emp_nss" />
            @error('emp_nss')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="exampleFormControlInput1">Employe nom</x-label>
            <x-input type="text" class="block mt-1 w-full" id="exampleFormControlInput1" wire:model="emp_nom" />
            @error('emp_nom')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="exampleFormControlInput2">Employe prenom </x-label>
            <x-input type="text" class="block mt-1 w-full" id="exampleFormControlInput2" wire:model="emp_prn" />
            @error('emp_prn')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="tarif" class="block mt-3 mb-1 font-medium text-sm text-gray-700">Employe Tarif</x-label>
            <select name="tarif" id="tarif" style="width: 100%;" wire:model="emp_tarif"
                class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
                <option value=""> </option>
                @foreach ($tarif as $value)
                    <option value={{ $value->tar_description }}>{{ $value->tar_description }}</option>
                @endforeach


            </select>
            @error('emp_tarif')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <x-button wire:click.prevent="store()" class="mt-4">Save</x-button>
    </form>
</x-auth-card>
