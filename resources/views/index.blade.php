<x-layouts.app>
    <div class="container mx-auto px-4 max-w-7xl">
        <h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-5">
            popular games
        </h2>
        <div class="popular games text-sm grid grid-cols-6 gap-12 border-b border-gray-800 pb-16">
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/ff7.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Final Fantasy VII Remake
                </a>
                <p>Play Station 5</p>
            </div>
            <div class="game mt-8">
                <div class="relative">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/Animal-crossing.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Animal Crossing:
                    New Horizons
                </a>
                <p>Nintendo Switch</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/doom.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Doom Eternal
                </a>
                <p>Play Station 5</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/ALYX.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Half Life: Alyx
                </a>
                <p>PC</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/luigis-mansion-3.jpg') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Luigi's Mansion 3
                </a>
                <p>Nintendo Switch</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/Resident-evil-3.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Resident Evil 3
                </a>
                <p>PC, Playstation 4, Xbox, One X</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/Resident-evil-3.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Resident Evil 3
                </a>
                <p>PC, Playstation 4, Xbox, One X</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/luigis-mansion-3.jpg') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Luigi's Mansion 3
                </a>
                <p>Nintendo Switch</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/ALYX.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Half Life: Alyx
                </a>
                <p>PC</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/doom.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Doom Eternal
                </a>
                <p>Play Station 5</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/Animal-crossing.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Animal Crossing:
                    New Horizons
                </a>
                <p>Nintendo Switch</p>
            </div>
            <div class="game mt-8">
                <div class="relative inline-block">
                    <a href="#">
                        <img src="{{ Vite::asset('resources/img/ff7.png') }}" alt="game-cover"
                            class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                    </a>

                    <!-- Score overlay (fixed positioning) -->
                    <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                        style="right: -29px; bottom: -29px;">
                        <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                    </div>
                </div>

                <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-4">
                    Final Fantasy VII Remake
                </a>
                <p>Play Station 5</p>
            </div>
        </div>
        <div class="flex my-10">
            <div class="recently-viewed w-3/4 mr-32">
                <h2 class="text-blue-500 uppercase tracking-wide font-semibold">recently viewed</h2>
                <div class="recently-reviews-container space-y-12 mt-8">
                    <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                        <div class="relative flex-none">
                            <a href="#">
                                <img src="{{ Vite::asset('resources/img/ff7.png') }}" alt="game-cover"
                                    class="hover:opacity-75 transition ease-in-out duration-150 w-48">
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
                                Final Fantasy VII Remake
                            </a>
                            <div class="text-gray-400 mt-1">Play Station 5</div>
                            <p class="mt-6 text-gray-400">
                                A spectacular re-imagining of the most visionary games ever, Final Fantasy VII Remake
                                rebuilds and expands the legendary RPG for today. The first game in the project will be
                                set in electric city of Midgar and presents a fully standalone gaming experience.
                            </p>
                        </div>
                    </div>
                    <div>Game Card</div>
                    <div>Game Card</div>
                </div>

            </div>
            <div class="most-anticipated w-1/4 mr-32">
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur quis deleniti unde libero vitae atque
                ullam itaque at eaque nostrum, eius dignissimos ab quasi? Dolorum corporis pariatur, explicabo eveniet
                delectus neque est ad libero necessitatibus fuga voluptate voluptas error omnis provident eius vitae
                vero
                alias natus quaerat, praesentium fugit illo!
            </div>
        </div>
    </div>
</x-layouts.app>
