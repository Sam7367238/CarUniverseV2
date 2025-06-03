@props(["page" => env("APP_NAME")])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $page }}</title>
    @vite("resources/css/app.css")
</head>
<body>
    <div class="grid md:grid-cols-7">
      <div class="md:col-span-1 md:flex md:justify-end">
        <nav class="text-right">
          <div class="flex justify-between items-center">
            <h1 class="font-bold uppercase p-4 border-b border-gray-100">
              <a href="{{ route('cars.index') }}" class="hover:text-gray-700">{{ env("APP_NAME") }}</a>
            </h1>

            <div class="px-4 cursor-pointer md:hidden" id="burger">
              <svg class="w-6" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path></svg>
            </div>
          </div>

          <ul class="text-sm mt-6 hidden md:block" id="menu">
            <li class="text-gray-700 font-semibold py-1">
              <a href="{{ route('cars.index') }}" class="px-4 flex justify-end {{ request()->routeIs('cars.index') ? 'border-r-4 border-red-500' : 'border-r-4 border-white' }}">
                <span>Home</span>
                <svg class="w-5 ml-2" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path></svg>
              </a>
            </li>

            <li class="text-gray-700 font-semibold py-1">
              <a href="{{ route('home') }}" class="px-4 flex justify-end {{ request() -> routeIs('home') ? 'border-r-4 border-red-500' : 'border-r-4 border-white' }}">
                <span>About</span>
                <svg class="w-5 ml-2" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z"></path></svg>
              </a>
            </li>
          </ul>
        </nav>
      </div>
  
      <main class="px-16 py-6 md:col-span-6">

        @guest
          <div class="flex justify-center md:justify-end">
            <a href="{{ route('login') }}" class="rounded-full py-2 px-3 text-xs font-bold cursor-pointer tracking-wider text-gray-700 border-red-500 border-2 hover:bg-red-500 hover:text-white transition ease-out duration-200">Log in</a>
            <a href="{{ route('auth.register') }}" class="rounded-full py-2 px-3 text-xs font-bold cursor-pointer tracking-wider text-gray-700 ml-3 border-red-500 border-2 hover:bg-red-500 hover:text-white transition ease-out duration-200">Sign up</a>
          </div>
        @endguest

        @auth
          <div class="flex justify-center md:justify-end">
            <a class="rounded-full py-2 px-3 text-xs font-bold cursor-pointer tracking-wider text-gray-700 border-red-500 border-2 hover:bg-red-500 hover:text-white transition ease-out duration-200 mr-3" href="{{ route('cars.create') }}">Post Car</a>
            <form action="{{ route('user.logout') }}" method="POST">
              @csrf
              @method("DELETE")
              
              <input class="rounded-full py-2 px-3 text-xs font-bold cursor-pointer tracking-wider text-gray-700 border-red-500 border-2 hover:bg-red-500 hover:text-white transition ease-out duration-200" type="submit" value="Log Out">
            </form>
          </div>
        @endauth

        {{ $slot }}
      </main>
    </div>

  <script>
    const burger = document.querySelector("#burger");
    const menu = document.querySelector("#menu");

    burger.addEventListener("click", (event) => {
      if (menu.classList.contains("hidden")) {
        menu.classList.remove("hidden");
      } else {
          menu.classList.add("hidden");
      }
    });
  </script>
</body>
</html>