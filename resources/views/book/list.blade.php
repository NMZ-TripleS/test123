<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end mb-4">
            <a href="{{route('books.create')}}" class=" bg-green-600 p-2 rounded-full shadow-inner text-white inline-block">New Book</a>
        </div>
            <div class="bg-white p-2 overflow-hidden shadow-xl sm:rounded-lg">
                @livewire('book-table')
            </div>
        </div>
    </div>
</x-app-layout>
