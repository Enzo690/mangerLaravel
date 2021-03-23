@foreach ($errors->all() as $error)
    <div  class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" bg-danger overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6  bg-danger border-b border-gray-200">
                    {{ $error }}
                </div>
            </div>
        </div>
    </div>
@endforeach
