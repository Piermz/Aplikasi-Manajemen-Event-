<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Event Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold mb-4">{{ $event->nama }}</h1>

                    @if($event->foto_poster)
                        <img src="{{ Storage::url($event->foto_poster) }}" alt="{{ $event->nama }}" class="w-full max-w-md mb-4 rounded-lg shadow-md">
                    @endif

                    <p class="mb-2"><strong>Description:</strong> {{ $event->deskripsi }}</p>
                    <p class="mb-2"><strong>Date:</strong> {{ $event->tanggal }}</p>
                    <p class="mb-2"><strong>Location:</strong> {{ $event->lokasi }}</p>

                    <div class="mt-4">
                        <a href="{{ route('events.edit', $event) }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">
                            Edit Event
                        </a>

                        <form action="{{ route('events.destroy', $event) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-300 disabled:opacity-25 transition" onclick="return confirm('Are you sure you want to delete this event?')">
                                Delete Event
                            </button>
                        </form>

                        <a href="{{ route('events.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500 active:bg-gray-700 focus:outline-none focus:border-gray-700 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                            Back to Events
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

