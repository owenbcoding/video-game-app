<div wire:init="loadComingSoon">
    @forelse ($comingSoon as $game)
        <div class="comming-soon-container space-y-10 mt-8">
            <div class="game flex">
                <a href="#">
                    <img src="{{ Str::replace('thumb', 'cover_small', $game['cover']['url'] ?? '') }}" alt="game-cover"
                        class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                </a>
                <div class="ml-4">
                    <a href="#" class="hover:text-gray-300">{{ $game['name'] ?? 'Unknown Game' }}</a>
                    <div class="text-gray-400 text-sm mt-1">
                        @if (isset($game['first_release_date']))
                            {{ carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
                        @else
                            Release date not available
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="flex justify-center items-center mt-10">
            <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-gray-400"></div>
            <button type="button" class="ml-5 mb-5" disabled>
                <svg class="mr-3 size-5 animate-spin ..." viewBox="0 0 24 24">
                    <!-- ... -->
                </svg>
                Processing…
            </button>
        </div>
    @endforelse
</div>
