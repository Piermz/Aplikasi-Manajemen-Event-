<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Event') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('events.update', $event) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Event</label>
                                <input type="text" name="nama" id="nama" value="{{ old('nama', $event->nama) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                            </div>

                            <div>
                                <label for="tanggal" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $event->tanggal ? \Carbon\Carbon::parse($event->tanggal)->format('Y-m-d') : '') }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                            </div>

                            <div class="md:col-span-2">
                                <label for="lokasi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Lokasi</label>
                                <input type="text" name="lokasi" id="lokasi" value="{{ old('lokasi', $event->lokasi) }}" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>
                            </div>

                            <div class="md:col-span-2">
                                <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" required>{{ old('deskripsi', $event->deskripsi) }}</textarea>
                            </div>

                            <div class="md:col-span-2">
                                <label for="foto_poster" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Foto Poster Event</label>
                                <div class="mt-1 flex items-center">
                                    <input type="file" name="foto_poster" id="foto_poster" class="hidden" onchange="displayFileName(this)">
                                    <label for="foto_poster" class="cursor-pointer bg-white dark:bg-gray-700 py-2 px-3 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Choose file
                                    </label>
                                    <span id="file-name" class="ml-3 text-sm text-gray-500 dark:text-gray-400"></span>
                                </div>
                                @if($event->foto_poster)
                                    <div class="mt-2">
                                        <img src="{{ Storage::url($event->foto_poster) }}" alt="Current Poster" class="h-32 w-auto object-cover rounded-lg">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-6 space-x-3">
                            <a href="{{ route('events.show', $event) }}" class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 border border-transparent rounded-md font-semibold text-xs text-gray-700 dark:text-gray-200 uppercase tracking-widest hover:bg-gray-400 dark:hover:bg-gray-600 active:bg-gray-500 dark:active:bg-gray-500 focus:outline-none focus:border-gray-500 dark:focus:border-gray-400 focus:ring focus:ring-gray-300 dark:focus:ring-gray-400 disabled:opacity-25 transition">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                                Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function displayFileName(input) {
            const fileName = input.files[0]?.name;
            document.getElementById('file-name').textContent = fileName || 'No file chosen';
        }
    </script>
</x-app-layout>
