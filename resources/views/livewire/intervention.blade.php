{{-- @include('layouts.navigation') --}}
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Interventions') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
            @if ($isOpen)
                @include('livewire.intervention.update')
            @else
                @include('livewire.intervention.create')
            @endif
        @endif
        <div class="flex flex-col">
            <div class="w-full">
                <div class="p-4 border-b border-gray-200 shadow flex justify-center">
                    <table class="p-4" id="sampleTable">
                        <thead>
                            <tr class="whitespace-nowrap">
                                <th class="p-8 text-xs text-gray-500">Int debut</th>
                                <th class="p-8 text-xs text-gray-500">Int emp nss</th>
                                <th class="p-8 text-xs text-gray-500">Int par id</th>
                                <th class="p-8 text-xs text-gray-500">Int nb jrs</th>
                                @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
                                    <th class="p-8 text-xs text-gray-500">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($intervention as $value)
                                <tr class="whitespace-nowrap">

                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->int_debut }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->int_emp_nss }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->int_par_id }}
                                    </td>

                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->int_nb_jrs }}
                                    </td>
                                    @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            {{-- <dd>{{ $value->int_debut }}</dd> --}}
                                            <x-button wire:click="edit({{ json_encode($value->int_debut) }})">Edit
                                            </x-button>
                                            @if (Auth::user()->role == 'admin')
                                                <x-button wire:click="delete({{ json_encode($value->int_debut) }})"
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
