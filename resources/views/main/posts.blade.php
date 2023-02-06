<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h1>
    </x-slot>
    
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"><h2>{{ $theme }}</h2></div>
      
    @foreach ($posts as $post)
        <div class="mt-4">
            <div class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><a href="/user/{{$post->user->id}}">{{ $post->user->name }}</a> at {{ $post->user->created_at }}</div>
            <p>{{ $post->text }}</p>
        </div>
    @endforeach
    
    <div class="mt-4">
        {{$posts->links()}}
    </div>
    
</x-app-layout>