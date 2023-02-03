<x-guest-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Themes of the {{ $section }}
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
    
    @foreach ($themes as $theme)
        <div class="mt-4">
            <a href="/section/{{ $theme->name }}">{{ $theme->name }}</a>
        </div>
    @endforeach
    
    
</x-hyest-layout>