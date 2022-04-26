{{-- @include('layouts.navigation') --}}
<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
            @if ($isOpen)
                @include('livewire.users.update')
            @else
                @include('livewire.users.create')
            @endif
        @endif
        <div class="flex flex-col">
            <div class="w-full">
                <div class="p-4 border-b border-gray-200 shadow flex justify-center">
                    <table class="p-4" id="sampleTable">
                        <thead>
                            <tr>
                                <th class="p-8 text-xs text-gray-500">Id</th>
                                <th class="p-8 text-xs text-gray-500">Nom</th>
                                <th class="p-8 text-xs text-gray-500">Role</th>
                                <th class="p-8 text-xs text-gray-500">Email</th>
                                @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
                                    <th class="p-8 text-xs text-gray-500">Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($user as $value)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->idu }}</td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->name }}</td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->role }}</td>
                                    <td class="px-6 py-4 text-sm text-center text-gray-500">{{ $value->email }}</td>
                                    @if (Auth::user()->role == 'editor' || Auth::user()->role == 'admin')
                                        <td class="px-6 py-4 text-sm text-center text-gray-500">
                                            <x-button wire:click="edit({{ $value->id }})" class="">
                                                Edit</x-button>
                                            @if (Auth::user()->role == 'admin')
                                                <x-button wire:click="delete({{ $value->id }})"
                                                    class="text-sm text-gray bg-red-400 rounded">Delete
                                                </x-button>
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
        $("#sampleTable").dataTable().fnDestroy();
        $(document).ready(function() {
            $('#sampleTable').DataTable({
                responsive: true,
            });
        });
    </script>
</div>
