<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Change post
        </h1>
    </x-slot>
    <form method="POST">
        @csrf
        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
            <textarea name='text' id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" required>{{ $post->text }}</textarea>
            @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
         </div>
        <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
            <button type="submit" name="change" value="true" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                Change
            </button>
        </div>
    </form>
</x-app-layout>