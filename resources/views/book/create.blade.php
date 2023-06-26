<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de Livros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Cadastrar Livro") }}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('book.store')}}">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="title" :value="__('Título')"/>
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                              :value="old('title')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="author" :value="__('Autor')"/>
                                <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                                              :value="old('author')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="publisher" :value="__('Editora')"/>
                                <x-text-input id="publisher" class="block mt-1 w-full" type="text" name="publisher"
                                              :value="old('publisher')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="isbn" :value="__('ISBN')"/>
                                <x-text-input id="isbn" class="block mt-1 w-full" type="text" name="isbn"
                                              :value="old('isbn')" required autofocus/>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Cadastrar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
