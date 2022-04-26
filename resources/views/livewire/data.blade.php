<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-2">
        <div class="flex flex-col">
            <div class="w-full">
                <div class="p-4 border-b border-gray-200 shadow ">
                    <div class="bg-white">
                        <select name="qst" wire:model="qst_select"
                            class="px-4 py-3 w-full bg-white rounded-md border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
                            <option value=""> Select Filter </option>
                            @for ($i = 0; $i < count($qsts); $i++)
                                <option value="{{ $i }}">{{ $qsts[$i] }}</option>
                            @endfor

                        </select>
                    </div>
                </div>
                <div class="mt-28 p-4 border-b border-gray-200 shadow ">
                    @switch($qst_select)
                        @case('0')
                            <div class="flex justify-center p-4">
                                <h1>Search Results:</h1>
                                <table class="flex justify-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nom</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($question1 as $question)
                                            <tr>
                                                <th>{{ $question['agr_nom'] }}</th>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @break

                        @case('1')
                            <div class="p-4">
                                <input wire:model="search" type="search" placeholder="Search by...">

                                <h1>Search Results:</h1>

                                <ul class="flex justify-center">
                                    @foreach ($question2 as $quest2)
                                        <li>{{ $quest2['par_nom'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @break

                        @case('2')
                            <div class="p-4">
                                <input wire:model="search" type="search" placeholder="Search by...">
                                <input wire:model="from" type="search" placeholder="Search by...">
                                <input wire:model="to" type="search" placeholder="Search by...">

                                <h1>Search Results:</h1>

                                <ul class="flex justify-center">
                                    @foreach ($question3 as $question)
                                        <li><strong>Nom:</strong> {{ $question['par_nom'] }} <strong>Lieu:</strong>
                                            {{ $question['emp_lieu'] }} <strong>Superficie:</strong>
                                            {{ $question['par_superficie'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @break

                        @case('3')
                            <div class="flex justify-center p-4">
                                <h1>Search Results:</h1>
                                <ul>
                                    @foreach ($question4 as $quest4)
                                        <li><strong>Parcelles: </strong>{{ $quest4['par_nom'] }} <strong>Nom Propriétaire:
                                            </strong> {{ $quest4['agr_nom'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @break

                        @case('4')
                            <div class="p-4">
                                <input wire:model="from" type="search" placeholder="Search by...">
                                <input wire:model="to" type="search" placeholder="Search by...">

                                <h1>Search Results:</h1>
                                <ul>
                                    @foreach ($question5 as $quest5)
                                        <li> <strong>Int debut : </strong>{{ $quest5['int_debut'] }}</li>
                                        <li> <strong>Nombre de jours : </strong>{{ $quest5['int_nb_jrs'] }}</li><br>
                                    @endforeach
                                </ul>
                            </div>
                        @break

                        @case('5')
                            <div class="flex justify-center p-4">
                                <h1>Search Results:</h1>
                                <ul>
                                    @foreach ($question6 as $quest6)
                                        <li><strong>Debut d'intervention :</strong> {{ $quest6['int_debut'] }} <strong>le nom
                                                de
                                                la
                                                parcelle concernée :</strong> {{ $quest6['par_nom'] }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @break

                        @case('6')
                            <div class="flex justify-center p-4">
                                <h1>Search Results:</h1>
                                <ul>
                                    @foreach ($question7 as $quest7)
                                        <li><strong>Debut d'intervention</strong> : {{ $quest7['int_debut'] }}
                                            <strong>Le nom de la parcelle concernée:</strong> {{ $quest7['par_nom'] }}
                                            <strong>Le nom de l'employé :</strong> {{ $quest7['emp_nom'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @break

                        @case('7')
                            <div class="p-4">
                                <input wire:model="search" type="search" placeholder="Search by...">

                                <h1>Search Results:</h1>
                                <ul>
                                    @foreach ($question8 as $quest8)
                                        <li><strong>Interventions de l'employe
                                            </strong>{{ $search }} : {{ $quest8['int_emp_nss'] }}
                                            <strong>Debut d'intervention</strong> : {{ $quest8['int_debut'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @break

                        @case('8')
                            <div class="flex justify-center p-4">
                                <h1>Search Results:</h1>
                                <ul>

                                    <li><strong>La superficie totale des parcelles :{{ $question9 }} </strong></li>

                                </ul>
                            </div>
                        @break

                        @case('9')
                            <div class="flex justify-center p-4">
                                <h1>Search Results:</h1>
                                <ul>

                                    <li><strong>Le nom de la plus grande parcelle : </strong>{{ $question10->par_nom }}
                                    </li>

                                </ul>
                            </div>
                        @break

                        @case('10')
                            <div class="flex justify-center p-4">
                                <h1>Search Results:</h1>
                                <ul>

                                    <li><strong>Le nom de la plus petite parcelle :</strong> {{ $question11->par_nom }}
                                    </li>

                                </ul>
                            </div>
                        @break

                        @default
                    @endswitch
                </div>
            </div>
        </div>


        
    </div>
