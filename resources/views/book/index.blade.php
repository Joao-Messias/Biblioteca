<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Livros Cadastrados') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Livros Cadastrados") }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('book.index') }}" method="GET">
                        @csrf
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label
                                    class="block uppercase tracking-wide text-gray-700 dark:text-gray-200 text-xs font-bold mb-2"
                                    for="q">
                                    {{ __("Pesquisa") }}
                                </label>
                                <div class="flex">
                                    <input
                                        class="appearance-none block w-full bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-200 border border-gray-200 dark:border-gray-700 rounded-l py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white dark:focus:bg-gray-600"
                                        id="q" name="q" type="text"
                                        placeholder="{{ __("Digite o título do livro ou o ISBN") }}"
                                        value="{{ old('q') }}">
                                    <button
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r"
                                        type="submit">
                                        {{ __("Pesquisar") }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">{{ __("Título") }}</th>
                            <th class="px-4 py-2">{{ __("Autor") }}</th>
                            <th class="px-4 py-2">{{ __("Editora") }}</th>
                            <th class="px-4 py-2">{{ __("ISBN") }}</th>
                            <th class="px-4 py-2">{{ __("Quantidade") }}</th>
                            <th class="px-4 py-2">{{ __("Ações") }}</th>
                        </tr>
                        </thead>

                        @foreach($books as $book)
                            <tbody>
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $book->title }}</td>
                                <td class="border px-4 py-2 text-center">{{ $book->author }}</td>
                                <td class="border px-4 py-2 text-center">{{ $book->publisher }}</td>
                                <td class="border px-4 py-2 text-center">{{ $book->isbn }}</td>
                                <td class="border px-4 py-2 text-center">{{ $book->quantity }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <a
                                        href="{{ route('book.edit', $book->id) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __("Editar") }}</a>

                                    <form
                                        action="{{ route('book.destroy', $book->id) }}"
                                        method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __("Excluir") }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach

                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
