<img id="arrow" class="md:hidden rounded-r-full bg-gray-100 p-2 absolute top-1/2 left-0"
    src="{{ asset('assets/img/angle-right-solid.svg') }}" alt="">

<div id="profile"
    class="absolute top-1/2 left-0 -translate-y-1/2 -translate-x-full transition-all ease-in-out md:static md:transform-none md:transition-none flex flex-col justify-center items-center gap-4 bg-gray-100 rounded-lg shadow-lg p-6 w-1/3 h-full">
    <img id="close-icon" class="ml-auto md:hidden" src="{{ asset('assets/img/x-solid.svg') }}" alt="close icon">
    <img class="rounded-full w-1/2" src="{{ asset('assets/img/user_profile.png') }}" alt="profile image">
    <div class="w-full">
        <p class="cursor-default px-4 py-2 mb-4 rounded-md text-gray-600 border border-solid border-gray-400">
            {{ session('nama') }}
        </p>
        <p class="cursor-default px-4 py-2 rounded-md text-gray-600 border border-solid border-gray-400">
            {{ session('fakultas') }}
        </p>
    </div>
    <a href="{{ route('logout') }}" class="bg-red-600 py-2 w-full text-center rounded-full mx-auto text-white">Log
        Out</a>
</div>
