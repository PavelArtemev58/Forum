<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Change theme
        </h1>
    </x-slot>
    <form method="POST">
        @csrf
        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
            <label for="theme_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Theme name</label>
            <input type="text" name="name" id="theme_name" class="@error('name') is-invalid @enderror block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $theme->name }}" required">
            @error('name')
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