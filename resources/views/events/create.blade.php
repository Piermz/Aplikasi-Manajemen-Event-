<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="nama" :value="__('Event Name')" />
                                <x-text-input id="nama" name="nama" type="text" class="mt-1 block w-full" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                            </div>

                            <div>
                                <x-input-label for="tanggal" :value="__('Date')" />
                                <x-text-input id="tanggal" name="tanggal" type="date" class="mt-1 block w-full date-input" required />
                                <x-input-error class="mt-2" :messages="$errors->get('tanggal')" />
                            </div>
                        </div>
                        <div>
                            <x-input-label for="lokasi" :value="__('Location')" />
                            <x-text-input id="lokasi" name="lokasi" type="text" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('lokasi')" />
                        </div>

                        <div>
                            <x-input-label for="deskripsi" :value="__('Description')" />
                            <textarea id="deskripsi" name="deskripsi" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" rows="4" required></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                        </div>

                        <div>
                            <x-input-label for="foto_poster" :value="__('Event Poster')" />
                            <input id="foto_poster" name="foto_poster" type="file" class="mt-2 block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100" required />
                            <x-input-error class="mt-2" :messages="$errors->get('foto_poster')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Cancel') }}
                            </a>
                            <x-primary-button class="ml-3">
                                {{ __('Create Event') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
