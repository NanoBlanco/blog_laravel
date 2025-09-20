@props(['chirp'])

<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <div class="flex space-x-3">
            @if ($chirp->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                            alt="{{ $chirp->user->name }}'s avatar" class="rounded-full">
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
                            alt="Anonymouse User" class="rounded-full">
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="font-semibold text-sm">{{ $chirp->user ? $chirp->user->name : 'Anónimo' }}</span>
                        <span class="text-base-content/60">.</span>
                        <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                        @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                            <span class="text-base-content/60">.</span>
                            <span class="text-sm text-base-content/60 italic">editado</span>
                        @endif
                    </div>
                    @if (auth()->check() && auth()->id() === $chirp->user_id)
                        <!-- Edit/Delete Buttons -->
                        <div class="flex gap-1">
                            <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
                                Edit
                            </a>
                            <form action="/chirps/{{ $chirp->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-ghost btn-xs text-error"
                                    onclick="return confirm('Estás seguro de borrarlo?')">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endif

                </div>
                <p class="mt-1">{{ $chirp->mensaje }}</p>
            </div>
        </div>
    </div>
</div>
