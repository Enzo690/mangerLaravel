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
        </div>


        <div class="max-w-6xl sm:px-6 lg:px-6">
            <table class="table is-hoverable">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($data['category'] as $category)
                    <tr @if($category->deleted_at) class="has-background-grey-lighter" @endif>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>
                            @if($category->deleted_at)
                                <form action="{{ route('category.restore', $category->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="button is-primary" type="submit">Restaurer</button>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route($category->deleted_at? 'category.force.destroy' : 'category.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="button is-danger" type="submit">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $data['category']->links() }}
        </div>

      </div>
    </div>

</x-app-layout>
