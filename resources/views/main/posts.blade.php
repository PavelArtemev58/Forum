<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Posts
        </h1>
    </x-slot>
    
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"><h2>{{ $theme }}</h2></div>
      <!-- Posts list -->
    @foreach ($posts as $post)
        <div class="mt-4">
            <div class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline"><a href="/user/{{$post->user->id}}">{{ $post->user->name }}</a> at {{ $post->user->created_at }}</div>
            <p>{{ $post->text }}</p>
        </div>
    @endforeach
    
    <div class="mt-4">
        {{$posts->links()}}
    </div>
    
    <!-- New post -->
    <div class="mb-4 bg-gray">Creact new post
            <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
            <form action="/addpost/{{ $theme }}" method="POST">
                @csrf
                <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                    <textarea name='text' id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a post..." required></textarea>
                    @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div><br>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                            Create
                        </button>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>