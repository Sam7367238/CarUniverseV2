<x-layout page="Home">
    @if (session("success"))
        <p class="bg-green-400 rounded shadow-sm mt-4 p-4 text-white font-semibold">{{ session("success") }}</p>
    @endif

    <h4 class="font-bold pb-2 mt-5 border-b border-gray-200">Featured</h4>
    
    <div class="mt-8 grid lg:grid-cols-3 gap-10">
        @foreach ($cars as $car)
            <a href="{{ route('cars.show', $car) }}">
                <div class="card hover:shadow-lg">
                    <img src="{{ $car -> image }}" alt="Car" class="w-full h-32 sm:h-48 object-cover">
                    @can("delete", $car)
                        <form action="{{ route('cars.destroy', $car) }}" method="POST">
                            @csrf
                            @method("DELETE")

                            <input type="submit" value="Delete" class="btn text-red-500">
                        </form>
                    @endcan

                    <div class="m-4">
                        <div class="flex items-center space-x-2">
                            <span class="font-bold">{{ $car -> name }}</span>
                        </div>
                        <span class="block text-gray-500 text-sm">Posted By {{ $car -> user -> name }}</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $cars -> links() }}
    </div>
</x-layout>