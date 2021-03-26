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
                @include('components/select',['datas' => $data['ingredient'], 'label' => 'Ingrédient','name' => 'id'])
                <x-button name="btn-1" type="submit">Chercher</x-button>
            </form>
            <br>



        </div>
    </div>
</x-app-layout>

