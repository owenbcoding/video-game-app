<div wire:init="loadMostAnticipated">
    @forelse ($mostAnticipated as $game)
        <div class="most-anticipated-container space-y-10 mt-8">
            <div class="game flex">
                <a href="#">
                    <img src="{{ Str::replace('thumb', 'cover_small', $game['cover']['url'] ?? '') }}" alt="game-cover"
                        class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                </a>
                <div class="ml-4">
                    <a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
                    <div class="text-gray-400 text-sm mt-1">
                        {{ carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div>
            loading...
        </div>
    @endforelse
</div>
