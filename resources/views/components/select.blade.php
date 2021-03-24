<div>
    <x-label>{{$label}}</x-label>
    <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="{{$name}}" >
        @foreach($datas as $data)
            <option  value="{{ $data->id }}">{{ $data->name }}</option>
        @endforeach
    </select>
</div>
