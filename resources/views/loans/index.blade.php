<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Empréstimos de Livros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Empréstimos") }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('loans.index') }}" method="GET">
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
                                        id="q" name="q" type="text" placeholder="{{ __("Digite o ISBN") }}"
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
                            <th class="px-4 py-2">{{ __("Livro") }}</th>
                            <th class="px-4 py-2">{{ __("Locatário") }}</th>
                            <th class="px-4 py-2">{{ __("ISBN") }}</th>
                            <th class="px-4 py-2">{{ __("Quantidade") }}</th>
                            <th class="px-4 py-2">{{ __("Status Atual") }}</th>
                            <th class="px-4 py-2">{{ __("Data do Emprestimo") }}</th>
                            <th class="px-4 py-2">{{ __("Data da Devolução") }}</th>
                        </tr>
                        </thead>
                        @foreach($loans as $loan)
                            <tbody>
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $loan->book->title }}</td>
                                <td class="border px-4 py-2 text-center">{{ $loan->client->name }}</td>
                                <td class="border px-4 py-2 text-center">{{ $loan->book->isbn }}</td>
                                <td class="border px-4 py-2 text-center">{{ $loan->quantity }}</td>
                                <td class="border px-4 py-2 text-center">{{ $loan->status }}</td>
                                <td class="border px-4 py-2 text-center">{{ $loan->loan_date }}</td>
                                <td class="border px-4 py-2 text-center">{{ $loan->return_date }}</td>
                                <td class="border px-4 py-2 text-center">
                                    <form
                                        action="{{ route('loans.return', $loan->id) }}"
                                        method="POST"
                                        class="inline-block">
                                        @csrf
                                        @method('PUT')
                                        @if($loan->status == 'Devolvido')
                                            <span class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                                                {{ __("Devolvido") }}
                                            </span>
                                        @else
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                {{ __("Marcar como devolvido!") }}
                                            </button>
                                        @endif
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
