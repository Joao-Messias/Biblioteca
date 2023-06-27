<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cadastro de Clientes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Cadastrar Cliente") }}
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{route('clients.store')}}">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="name" :value="__('Nome')"/>
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                              :value="old('name')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="email" :value="__('Email')"/>
                                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email"
                                              :value="old('email')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="phone" :value="__('Telefone')"/>
                                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                              :value="old('phone')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="address" :value="__('Endereço')"/>
                                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address"
                                              :value="old('address')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="city" :value="__('Cidade')"/>
                                <x-text-input id="city" class="block mt-1 w-full" type="text" name="city"
                                              :value="old('city')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="state" :value="__('Estado')"/>
                                <x-text-input id="state" class="block mt-1 w-full" type="text" name="state"
                                              :value="old('state')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="zipcode" :value="__('CEP')"/>
                                <x-text-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode"
                                              :value="old('zipcode')" required autofocus/>
                            </div>
                            <div class="col-span-2 sm:col-span-1">
                                <x-input-label for="country" :value="__('País')"/>
                                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country"
                                              :value="old('country')" required autofocus/>
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
