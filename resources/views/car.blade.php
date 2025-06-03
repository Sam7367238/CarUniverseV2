<x-layout page="Car">
    <div class="card bg-white rounded-lg shadow-md overflow-hidden max-w-md mx-auto my-6 transition-transform transform hover:scale-105">
        <img src="{{ $car->image }}" alt="Car" class="w-full h-48 object-cover">
        <div class="p-4">
            <span class="font-bold text-lg text-gray-800">{{ $car->name }}</span>
            <span class="block text-gray-500 text-sm mt-1">Posted By {{ $car->user->name }}</span>
        </div>
    </div>

    <div class="border-b border-gray-200"></div>
    <p class="flex justify-start text-2xl mb-2">Comments</p>

    <div class="grid gap-2">
        @if ($car -> comments -> isEmpty())
            <p>There are no comments.</p>
        @endif

        <form action="{{ route('comment.store', $car) }}" method="post">
            @csrf
            @method("POST")

            <div class="mb-2">
                <label for="comment" class="block text-gray-700 font-semibold mb-1">Your Comment</label>
                <input type="text" name="comment" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring">

                @error("comment")
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-2">
                <label for="rating" class="block text-gray-700 font-semibold mb-1">Rating (1-5)</label>
                <input type="number" name="rating" class="w-20 border rounded px-3 py-2 focus:outline-none focus:ring">

                @error("rating")
                    <p class="text-red-400">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <input type="submit" class="rounded-full py-2 px-4 text-xs font-bold cursor-pointer tracking-wider text-gray-700 ml-3 border-red-500 border-2 hover:bg-red-500 hover:text-white transition ease-out duration-200" value="Comment">
            </div>
        </form>

        @foreach ($car -> comments as $comment)
            <div class="w-full bg-white rounded-lg shadow p-4 flex flex-col sm:flex-row items-start sm:items-center">
                <div class="flex items-center mb-2 sm:mb-0">
                    <span class="font-semibold text-gray-800 mr-2">{{ $comment -> user -> name}}</span>
                    <span class="text-yellow-500 flex items-center text-sm">
                        <span class="ml-1 text-gray-600">(⭐ {{$comment -> rating}}/5)</span>
                    </span>
                </div>
                <span class="text-gray-700 sm:ml-4 break-words">{{ $comment->comment }}</span>
            </div>
        @endforeach
    </div>
</x-layout>