<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Realizar Empréstimo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Realizar Empréstimo") }}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('loans.store')}}">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <label for="client" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Cliente') }}
                                </label>
                                <select id="client" name="client"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Selecione um cliente</option>
                                    @foreach($clients as $client)
                                        <option value="{{$client->id}}">{{$client->name}}</option>
                                    @endforeach
                                </select>
                                @error('client')
                                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <label for="book" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                    {{ __('Livro') }}
                                </label>
                                <select id="book" name="book"
                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                    <option value="">Selecione um Livro</option>
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}">{{$book->title}}</option>
                                    @endforeach
                                </select>
                                @error('book')
                                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="return_date" :value="__('Data de Devolução')"/>
                                <x-text-input id="return_date" class="block mt-1 w-full" type="date"
                                              name="return_date"
                                              :value="old('return_date')" autofocus/>
                                @error('return_date')
                                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="quantity" :value="__('Quantidade para locar')"/>
                                <x-text-input id="quantity" class="block mt-1 w-full" type="number" name="quantity"
                                              :value="old('quantity')" autofocus/>
                                @error('quantity')
                                <p class="text-red-600 text-xs mt-1">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Finalizar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
