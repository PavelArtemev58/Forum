<x-app-layout>
    <x-slot:header>
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            User {{ $user->name }}
        </h1>
    </x-slot>
    
    <div class="mt-4">
        Email: {{ $user->email }}
    <div>
    <div class="mt-4">
        Registered {{ $user->created_at }}
    </div>
</x-app-layout>