   <div wire:init="loadPopularGames"
       class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
       @forelse ($popularGames as $game)
           <div class="game mt-8">
               <div class="relative inline-block">
                   <a href="#">
                       <img src="{{ Str::replace('thumb', 'cover_big', $game['cover']['url'] ?? '') }}" alt="game-cover"
                           class="hover:opacity-75 transition ease-in-out duration-150 w-full">
                   </a>

                   @if (isset($game['rating']))
                       <div class="absolute bottom-2 right-2 w-16 h-16 bg-gray-800 text-white rounded-full flex items-center justify-center"
                           style="right: -29px; bottom: -29px;">
                           <div class="font-semibold text-xs flex justify-center items-center h-full">
                               {{ round($game['rating']) . '%' }}
                           </div>
                       </div>
                   @endif
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
       @empty
           <div>
                loading...
           </div>
       @endforelse
   </div>
