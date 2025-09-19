<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-2x1 mx-auto">
        <h1 class="text-3x1 font-bold mt-8">Lastest Chirps</h1>

        <div class="space-y-4 mt-8">
            @forelse ($chirps as $chirp)
                <x-chirp :chirp="$chirp" />
            @empty
                <div class="hero-py-12">
                    <div class="hero-content-text-center">
                        <svg class="mx-auto h-12 w-12 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">

                            </path>
                        </svg>
                        <p class="mt-4 text-base-content/60">No hay comentarios. Envía el primero...</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
