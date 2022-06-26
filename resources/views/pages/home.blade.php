<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            @auth
                Welcome now you are logged,so you can edit,add,view and delete products
            @else
                Welcome to auction store
            @endauth
        </h2>
    </x-slot>
</x-app-layout>
