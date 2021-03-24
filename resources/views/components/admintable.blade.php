
<div class="max-w-6xl sm:px-6 lg:px-6">
    {{$object}}
    <table class="table is-hoverable">
        <thead>
        <tr>
            <th>Nom</th>

        </tr>
        </thead>
        <tbody>
        @foreach($datas as $data)
            <tr @if($data->deleted_at) class="has-background-grey-lighter" @endif>
                <td><strong>{{ $data->name }}</strong></td>
                <td>
                    @if($data->deleted_at)
                        <form action="{{ route($object.'.restore', $data->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button class="button is-primary" type="submit">Restaurer</button>
                        </form>
                    @endif
                </td>
                <td>
                    <form action="{{ route($data->deleted_at? $object.'.force.destroy' : $object.'.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="button is-danger" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $datas->links() }}
</div>
