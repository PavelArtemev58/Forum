<x-guest-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
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
    
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"><h2>{{ $theme }}</h2></div>
      
    @foreach ($posts as $post)
        <div class="mt-4">
            <div class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{ $post->user->name }} at {{ $post->user->created_at }}</div>
            <p>{{ $post->text }}</p>
        </div>
    @endforeach
    
    <div class="mt-4">
        {{$posts->links()}}
    </div>
    
</x-guest-layout>