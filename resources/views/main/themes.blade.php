<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            Themes of the {{ $section }}
        </h1>
    </x-slot>
    
    @foreach ($themes as $theme)
        <div class="mt-4">
            <a href="/section/{{ $section }}/{{ $theme->name }}">{{ $theme->name }}</a>
        </div>
    @endforeach
    
    <div class="mt-4">
        {{$themes->links()}}
    </div>
</x-app-layout>