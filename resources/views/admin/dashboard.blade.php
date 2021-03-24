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

        <div class="max-w-6xl sm:px-6 lg:px-6">
            <form id="category" action="{{ route('category.store') }}" method="POST">

                @csrf

                <x-label>Nouvelle catégorie</x-label>
                <x-input type="text" name="name"/>
                <x-button name="btn-1" type="submit">Créer</x-button>
                </form>
            <br>
            <form id="ingredient" action="{{ route('ingredient.store') }}" method="POST">

                @csrf

                <x-label>Nouvelle Ingrédient</x-label>
                <x-input type="text" name="name"/>
                <x-button name="btn-2" type="submit">Créer</x-button>
                </form>
            <br>
            <form id="origin" action="{{ route('origin.store') }}" method="POST">

                @csrf

                <x-label>Nouvelle Origine</x-label>
                <x-input type="text" name="name"/>
                <x-button name="btn-3" type="submit">Créer</x-button>
            </form>
            <br>
            <form id="type" action="{{ route('type.store') }}" method="POST">

                @csrf

                <x-label>Nouveau Type</x-label>
                <x-input type="text" name="name"/>
                <x-button name="btn-4" type="submit">Créer</x-button>
            </form>
            <br>
            <br>

            <form id="plat">
                <x-label>Nouveau plat</x-label>
                <x-input type="text" name="name"/>
            </form>
        </div>
        <div class="max-w-6xl sm:px-6 lg:px-6">

            <div class="py-12 panelElement">

        @include('components/admintable',['datas' => $data['category'], 'object' => 'category'])
        @include('components/admintable',['datas' => $data['type'], 'object' => 'type'])
            </div>

            <div class="py-12 panelElement">

        @include('components/admintable',['datas' => $data['ingredient'], 'object' => 'ingredient'])

        @include('components/admintable',['datas' => $data['origin'], 'object' => 'origin'])
            </div>

        </div>



    </div>

</x-app-layout>
