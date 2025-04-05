<x-layouts.app>
    <div class="container mx-auto px-4 max-w-7xl">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-5">
            popular games
        </h2>
        <livewire:popular-games />
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-viewed w-full  lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">recently viewed</h2>
                <livewire:recently-reviewed />
            </div>
            <div class="most-anticipated w-1/4 lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                @foreach ($mostAnticipated as $game)
                    <div class="most-anticipated-container space-y-10 mt-8">
                        <div class="game flex">
                            <a href="#">
                                <img src="{{ Str::replace('thumb', 'cover_small', $game['cover']['url'] ?? '') }}"
                                    alt="game-cover" class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                            </a>
                            <div class="ml-4">
                                <a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
                                <div class="text-gray-400 text-sm mt-1">
                                    {{ carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach


                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-8">Coming Soon</h2>
                @foreach ($comingSoon as $game)
                    <div class="comming-soon-container space-y-10 mt-8">
                        <div class="game flex">
                            <a href="#">
                                <img src="{{ Str::replace('thumb', 'cover_small', $game['cover']['url'] ?? '') }}"
    alt="game-cover" class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                            </a>
                            <div class="ml-4">
                                <a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
                                <div class="text-gray-400 text-sm mt-1">
                                    {{ carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layouts.app>