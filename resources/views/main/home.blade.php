<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Forum
        </h1>
    </x-slot>
    
   <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8"><h2>Sections</h2></div>
            
    @foreach ($sections as $section)
        <div class="mt-4">
            <a href="/section/{{ $section->name }}">{{ $section->name }}</a>
        </div>
    @endforeach

</x-app-layout>