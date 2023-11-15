<li class="px-2 py-1 text-white transition-colors duration-150">
    <div class="px-1 hover:text-yellow-300  rounded-lg @if(Route::current()->uri == $uri) text-yellow-300 @endif">
        <a  {{ $attributes }} onclick="loading()" class="flex items-center py-1 px-1">
            {{$icon}}
            <span class="w-full ml-2 font-semibold text-sm">{{$title}}</span>
        </a>
    </div>
</li>
