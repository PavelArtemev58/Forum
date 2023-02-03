<x-guest-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Forum
        </h1>
    </x-slot>
    <!-- Login/Auth/Dashboard -->
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    
   <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"><h2>Sections</h2></div>
            
    @foreach ($sections as $section)
        <div class="mt-4">
            <a href="/section/{{ $section->name }}">{{ $section->name }}</a>
        </div>
    @endforeach
    
<!--    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            Login
        </a>
    </div>-->
</x-guest-layout>