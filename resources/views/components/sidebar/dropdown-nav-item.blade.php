<li class="relative px-2 py-1" x-data="{ {{$active}}: false }">
    <div 
        class="inline-flex items-center justify-between w-full text-base font-semibold  
        cursor-pointer transform  
        hover:scale-105 transition duration-300
        @if(\Request::is($uri))
        bg-teal-500 p-1 rounded-lg text-yellow-300
        @else
        text-white hover:text-yellow-300 
        @endif"
        x-on:click="{{$active}} = !{{$active}}">
        <a href="#" class="inline-flex items-center text-sm font-semibold  
        @if(\Request::is($uri))
        bg-teal-500 p-1 rounded-lg text-yellow-300
        @else
        text-white hover:text-yellow-300 
        @endif">
            {{ $icon }}
            <span class="ml-4 uppercase">{{$title}}</span>
        </a>
        <x-heroicon-o-chevron-left x-show="!{{$active}}" class="w-4 h-4 ml-1"  style="display: none;"/>
        <x-heroicon-o-chevron-down x-show="{{$active}}" class="w-4 h-4 ml-1"  style="display: none;"/>
    </div>

    <span x-show.transition="{{$active}}" x-cloak>
        <ul x-transition:enter="transition-all ease-in-out duration-300" x-transition:enter-start="opacity-25 max-h-0"
            x-transition:enter-end="opacity-100 max-h-xl" x-transition:leave="transition-all ease-in-out duration-300"
            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium bg-teal-500 rounded-md shadow-inner "
            aria-label="submenu">

            {{$slot}}
            

        </ul>
    </span>
</li>