{{-- @include('layouts.navigation') --}}
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agricultures') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
            @if ($isOpen)
                @include('livewire.agriculteur.update')
            @else
                @include('livewire.agriculteur.create')
            @endif
        @endif
        <div class="flex flex-col">
            <div class="w-full">
                <div class="p-4 border-b border-gray-200 shadow flex justify-center">
                    <table class="p-4" id="sampleTable">
                        <thead>
                            <tr class="whitespace-nowrap">
                                <th class="p-8 text-xs text-gray-500">Agr_id</th>
                                <th class="p-8 text-xs text-gray-500">Agr_nom</th>
                                <th class="p-8 text-xs text-gray-500">Agr_prenom</th>
                                <th class="p-8 text-xs text-gray-500">Agr_resid</th>
                                @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
                                    <th class="p-8 text-xs text-gray-500">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($agriculteur as $value)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->agr_id }}</td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->agr_nom }}</td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->agr_prn }}</td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->agr_resid }}
                                    </td>
                                    @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            <x-button wire:click="edit({{ $value->agr_id }})">Edit</x-button>
                                            @if (Auth::user()->role == 'admin')
                                                <x-button wire:click="delete({{ $value->agr_id }})"
                                                    class="text-sm text-gray bg-red-400 rounded">Delete</x-button>
                                            @endif
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#sampleTable').DataTable({
                responsive: true,
            });
        });
    </script>
</div>
