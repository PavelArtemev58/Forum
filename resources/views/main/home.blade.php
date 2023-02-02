<x-guest-layout>
    
    @foreach ($sections as $section)
        <div class="mt-4">
            <a href="/section/{{ $section->name }}">{{ $section->name }}</a>
        </div>
    @endforeach
    
    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
            Login
        </a>
    </div>
</x-guest-layout>