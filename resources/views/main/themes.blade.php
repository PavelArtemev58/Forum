<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Themes of the {{ $section }}
        </h1>
    </x-slot>
    <!-- Themes list -->
    @foreach ($themes as $theme)
        <div class="mt-4">
            <div class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Author <a href="/user/{{ $theme->user->id }}">{{ $theme->user->name }}</a></div>
            <a href="/section/{{ $section }}/{{ $theme->name }}">{{ $theme->name }}</a>
            
            <!-- Delete/Change -->
            @if ($theme->user_id == Auth::user()->id)
            <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                <div >
                    <form action="/changetheme/{{$theme->id}}" method="POST">
                        @csrf
                        <button type="submit" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Change</button>
                    </form>
                </div>
                <div>
                    <form action="/deletetheme/{{ $theme->id }}" method="POST">
                        @csrf
                        <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Delete</button>
                    </form>
                </div>
            </div>
            @endif
            
        </div>
    @endforeach
    
    <div class="mt-4">
        {{$themes->links()}}
    </div>
    
    <!-- New theme -->
        <div class="mb-4 bg-gray">Creact new theme
        
        <form action="/addtheme/{{ $section }}" method="POST">
            @csrf
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="mb-4">
                    <label for="theme_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Theme name</label>
                    <input type="text" name="name" id="theme_name" class="@error('name') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Theme" required">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                </div><br>
                <button type="submit" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Create</button>
                
            </div>
        </form>
            </div>
</x-app-layout>