<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edição de Livros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 dark:bg-gray-800">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('book.update', $book->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="title" :value="__('Título')"/>
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                              :value="$book->title" required autofocus/>
                                @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="author" :value="__('Autor')"/>
                                <x-text-input id="author" class="block mt-1 w-full" type="text" name="author"
                                              :value="$book->author" required autofocus/>
                                @error('author')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="publisher" :value="__('Editora')"/>
                                <x-text-input id="publisher" class="block mt-1 w-full" type="text" name="publisher"
                                              :value="$book->publisher" required autofocus/>
                                @error('publisher')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <x-input-label for="isbn" :value="__('ISBN')"/>
                            <x-text-input id="isbn" class="block mt-1 w-full" type="text" name="isbn"
                                          :value="$book->isbn" required autofocus/>
                            @error('isbn')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <x-input-label for="quantity" :value="__('Quantidade')"/>
                            <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                                          :value="$book->quantity" required autofocus/>
                            @error('quantity')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Salvar Alterações') }}
                            </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
