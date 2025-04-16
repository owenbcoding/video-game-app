<div wire:init="loadMostAnticipated">
    @forelse ($mostAnticipated as $game)
        <div class="most-anticipated-container space-y-10 mt-8">
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
        <div wire:loading class="flex justify-center items-center">
            <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-gray-400"></div>
            <span class="ml-2 text-gray-400">Loading...</span>
        </div>
    @endforelse
</div>
