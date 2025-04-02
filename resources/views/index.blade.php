<x-layouts.app>
    <div class="container mx-auto px-4 max-w-7xl">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-5">
            popular games
        </h2>
        <div
            class="popular games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
            @foreach ($popularGames as $game)
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="#">
                            <img src="{{ Str::replace('thumb', 'cover_big', $game['cover']['url']) }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                        </a>

                        <!-- Score overlay (fixed positioning) -->
                        <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                            style="right: -29px; bottom: -29px;">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">
                                {{ $game['rating'] ?? '%' }}
                            </div>
                        </div>
                    </div>

                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                        {{ $game['name'] }}
                    </a>
                    <div class="text-gray-400 mt-1">
                        @foreach ($game['platforms'] as $platform)
                            @if (array_key_exists('abbreviation', $platform))
                                {{ $platform['abbreviation'] }},
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
        <div class="flex flex-col lg:flex-row my-10">
            <div class="recently-viewed w-full  lg:w-3/4 mr-0 lg:mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">recently viewed</h2>
                <div class="recently-reviews-container space-y-12 mt-8">
                    @foreach ($recentlyReviewed as $element)
                        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                            <div class="relative flex-none">
                                <a href="#">
                                    <img src="{{ Str::replace('thumb', 'cover_big', $element['cover']['url']) }}"
                                        alt="game-cover"
                                        class="hover:opacity-75 transition ease-in-out duration-150 w-20 lg:w-48">
                                </a>

                                <!-- Score overlay -->
                                <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                                    style="right: -20px; bottom: -20px;">
                                    <div class="font-semibold text-xs flex justify-center items-center h-full">
                                        80%
                                    </div>
                                </div>
                            </div>
                            <div class="ml-12">
                                <a href="#"
                                    class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                                    {{ $element['name'] }}
                                </a>
                                <div class="text-gray-400 mt-1">
                                    @foreach ($element['platforms'] as $platform)
                                        @if (array_key_exists('abbreviation', $platform))
                                            {{ $platform['abbreviation'] }},
                                        @endif
                                    @endforeach
                                </div>
                                @if (array_key_exists('summary', $element))
                                    <p class="mt-6 text-gray-400 hidden lg:block">
                                        {{ $element['summary'] ?? '' }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="most-anticipated w-1/4 lg:w-1/4 mt-12 lg:mt-0">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most Anticipated</h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/Cyberpunk.png') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/Marvels-avengers.png') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Marvel's Avengers</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 3, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/Ghost_of_Tsushima.jpg') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Ghost of Tsushima</a>
                            <div class="text-gray-400 text-sm mt-1">July 17, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/The-Last-of-Us-2.png') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">The Last of Us Part II</a>
                            <div class="text-gray-400 text-sm mt-1">June 19, 2020</div>
                        </div>
                    </div>
                </div>

                <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-8">Comming Soon</h2>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/Cyberpunk.png') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Cyberpunk 2077</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 16, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/Marvels-avengers.png') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Marvel's Avengers</a>
                            <div class="text-gray-400 text-sm mt-1">Sept 3, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/Ghost_of_Tsushima.jpg') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">Ghost of Tsushima</a>
                            <div class="text-gray-400 text-sm mt-1">July 17, 2020</div>
                        </div>
                    </div>
                </div>
                <div class="most-anticipated-container space-y-10 mt-8">
                    <div class="game flex">
                        <a href="#">
                            <img src="{{ Vite::asset('resources/img/The-Last-of-Us-2.png') }}" alt="game-cover"
                                class="hover:opacity-75 transition ease-in-out duration-150 w-16">
                        </a>
                        <div class="ml-4">
                            <a href="#" class="hover:text-gray-300">The Last of Us Part II</a>
                            <div class="text-gray-400 text-sm mt-1">June 19, 2020</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
