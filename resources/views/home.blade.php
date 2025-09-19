<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
    <div class="max-w-2x1 mx-auto">
        @foreach ($chirps as $chirp)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold">{{ $chirp['autor'] }}</div>
                        <div class="mt-1">{{ $chirp['mensaje'] }}</div>
                        <div class="text-sm text-gray-500 mt-2">{{ $chirp['tiempo'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
