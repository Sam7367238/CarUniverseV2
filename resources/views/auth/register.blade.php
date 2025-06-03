<x-layout page="Sign Up">
  <h1 class="text-center text-3xl font-semibold">Sign Up</h1>
  <form class="bg-white p-8 grid gap-6 rounded-xl shadow-lg max-w-lg mx-auto mt-8 border border-gray-200" method="POST" action="{{ route('user.signup') }}">
      @csrf
      @method("POST")

      <div>
        <label for="name" class="block text-gray-700 font-semibold mb-2 text-lg text-center">Name</label>
        <input class="w-full rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/30 shadow-sm px-4 py-2 transition duration-150" type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}">

        @error("name")
            <p class="block text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="email" class="block text-gray-700 font-semibold mb-2 text-lg text-center">Email</label>
        <input class="w-full rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/30 shadow-sm px-4 py-2 transition duration-150" type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
      
        @error("email")
            <p class="block text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password" class="block text-gray-700 font-semibold mb-2 text-lg text-center">Password</label>
        <input class="w-full rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/30 shadow-sm px-4 py-2 transition duration-150" type="password" name="password" placeholder="Enter your password">
      
        @error("password")
            <p class="block text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div>
        <label for="password_confirmation" class="block text-gray-700 font-semibold mb-2 text-lg text-center">Confirm Password</label>
        <input class="w-full rounded-lg border border-gray-300 focus:border-primary focus:ring-2 focus:ring-primary/30 shadow-sm px-4 py-2 transition duration-150" type="password" name="password_confirmation" placeholder="Confirm your password">
      </div>

      <div class="flex justify-center">
        <input type="submit" value="Sign Up" class="btn text-gray-700 border-2 border-red-500 hover:bg-red-500 hover:text-white hover:shadow-lg transition ease-out duration-200 px-6 py-2 font-semibold rounded-lg">
      </div>
  </form>
</x-layout>