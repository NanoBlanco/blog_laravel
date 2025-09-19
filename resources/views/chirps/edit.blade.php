<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2x1 mx-auto">
        <h1 class="text-3x1 font-bold mt-8">Edit Chirp</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form method="POST" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control-w-full">
                        <textarea name="mensaje" rows="4" maxlength="250" placeholder="What's on your mind?"
                            class="textarea textarea-bordered w-full resize-none @error('mensaje') textarea-error @enderror">{{ old('mensaje', $chirp->mensaje) }}</textarea>

                        @error('mensaje')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">Cancel</a>
                        <button type="submit" class="btn btn-primary btn-sm">Update Chirp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
