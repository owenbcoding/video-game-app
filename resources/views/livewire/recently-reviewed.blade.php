    <div wire:init="loadrecentlyReviewed" class="recently-reviews-container space-y-12 mt-8">
        @forelse ($recentlyReviewed as $game)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <a href="#">
                        <img src="{{ Str::replace('thumb', 'cover_big', $game['cover']['url'] ?? '') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-20 lg:w-48">
                    </a>
                    @if (isset($game['rating']))
                        <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                            style="right: -20px; bottom: -20px;">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{ round($game['rating']) . '%' }}
                            </div>
                        </div>
                    @endif
                </div>
                <div class="ml-12">
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                        {{ $game['name'] ?? 'Unknown Game' }}
                    </a>
                    <div class="text-gray-400 mt-1">
                        @if (isset($game['platforms']) && is_array($game['platforms']))
                            @foreach ($game['platforms'] as $platform)
                                @if (array_key_exists('abbreviation', $platform))
                                    {{ $platform['abbreviation'] }},
                                @endif
                            @endforeach
                        @endif
                    </div>
                    @if (isset($game['summary']) && is_string($game['summary']))
                        <p class="mt-6 text-gray-400 hidden lg:block">
                            {{ Str::limit($game['summary'], 150) }}
                        </p>
                    @endif
                </div>
            </div>
        @empty
            <div wire:loading class="flex justify-center items-center">
                <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-gray-400"></div>
                <span class="ml-2 text-gray-400">Loading...</span>
            </div>
        @endforelse
    </div>
