<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>
    <form>
        <div>
            <x-label for="tarif" class="block mt-3 mb-1 font-medium text-sm text-gray-700">Employe Tarif</x-label>
            <select name="tarif" id="tarif" style="width: 100%;" wire:model="int_emp_nss"
                class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
                <option value=""> </option>
                @foreach ($emp as $value)
                    <option value={{ $value->emp_nss }}>{{ $value->emp_nss }}</option>
                @endforeach
            </select>
            @error('int_emp_nss')
                <span class="text-rose-700">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="tarif" class="block mt-3 mb-1 font-medium text-sm text-gray-700">int_par_id</x-label>
            <select name="tarif" id="tarif" style="width: 100%;" wire:model="int_par_id"
                class="block rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                required>
                <option value=""> </option>
                @foreach ($parc as $value)
                    <option value={{ $value->par_id }}>{{ $value->par_id }}</option>
                @endforeach
            </select>
            @error('int_par_id')
                <span class="text-rose-700">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <x-label for="exampleFormControlx-input3">Int nb jrs</x-label>
            <x-input class="mt-1 w-full" type="text" id="exampleFormControlx-input3" wire:model="int_nb_jrs" />
            @error('int_nb_jrs')
                <span class="text-rose-700">{{ $message }}</span>
            @enderror
        </div>
        <x-button wire:click.prevent="update()" class="mt-4">Update</x-button>
        <x-button wire:click.prevent="cancel()" class="mt-4 text-sm text-gray bg-red-400 rounded">Cancel</x-button>
    </form>
</x-auth-card>
