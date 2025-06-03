<x-layout page="New Car">
    <h1 class="text-center text-3xl font-semibold">New Car</h1>
    <form class="bg-white p-8 grid gap-6 rounded-xl shadow-lg max-w-lg mx-auto mt-8 border border-gray-200" method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
      @csrf
      @method("POST")

      <div>
        <label for="name" class="block text-gray-700 font-semibold mb-2 text-lg text-center">Name</label>
        <input class="w-full rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/30 shadow-sm px-4 py-2 transition duration-150" type="text" name="name" placeholder="Full Car Description" value="{{ old('name') }}">

        @error("name")
            <p class="block text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="carphoto" class="block text-gray-700 font-semibold mb-2 text-lg text-center">Car Picture</label>
        <input class="w-full rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/30 shadow-sm px-4 py-2 transition duration-150" type="file" name="carphoto" placeholder="Car Photo" value="{{ old('carphoto') }}">
      
        @error("carphoto")
            <p class="block text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex justify-center">
        <input type="submit" value="Post" class="btn text-gray-700 border-2 border-red-500 hover:bg-red-500 hover:text-white hover:shadow-lg transition ease-out duration-200 px-6 py-2 font-semibold rounded-lg">
      </div>
  </form>
</x-layout>