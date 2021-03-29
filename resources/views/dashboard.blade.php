<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Bienvenue {{ Auth::user()->name }} <3
                </div>
            </div>
        </div>
    </div>

    <div class="py-12 panelElement">
        <div class="max-w-12xl sm:px-12 lg:px-12">

                <form id="category" action="{{ route('search.ingredients') }}" method="POST">
                    @csrf
                    @include('components/select',['datas' => $datas['ingredient'], 'label' => 'Ingrédient','name' => 'id'])
                    <x-button name="btn-1" type="submit">Chercher</x-button>
                </form>

            <br>
            @if(isset($datas['plat']))
                <table class="table is-hoverable">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Type</th>
                        <th>Origine</th>
                        <th>Ingrédients</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($datas['plat'] as $data)
                        <tr @if($data->deleted_at) class="has-background-grey-lighter" @endif>
                            <td><strong>{{ $data->name }}</strong></td>
                            <td><strong>{{ $data->category->name }}</strong></td>
                            <td><strong>{{ $data->type->name }}</strong></td>
                            <td><strong>{{ $data->origin->name }}</strong></td>
                            <td>
                                <ul>
                                    @foreach($data->ingredients as $ingredient)

                                        <strong>
                                            <li>
                                                {{ $ingredient->name }}
                                            </li>
                                        </strong>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</x-app-layout>

