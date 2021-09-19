<div x-data="{open: {{ $isActive ? 'true' : 'false' }} }" class="flex flex-col">
    <span
        class="flex flex-row items-center justify-between py-2.5 px-4 rounded cursor-pointer gap-2 transition duration-200"
        :class="open != true ? 'hover:text-white hover:bg-gray-700' : 'text-white bg-gray-700'"
        x-on:click="open = !open">
        <div class="flex flex-row gap-2">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg"><path
                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
            </svg>
            {{ $title }}
        </div>
        <svg x-show="open == false" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg"><path
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        <svg x-show="open == true" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
             xmlns="http://www.w3.org/2000/svg"><path
                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
    </span>

    @if(isset($subItems))
        <ul :class="open ? 'bg-blue-500' : 'hidden'">
            @foreach($subItems as $item)
                <li class="px-8 py-2 hover:bg-blue-400 hover:text-black cursor-pointer flex flex-row items-center gap-2 hover:gap-4 transition duration-200 ease-in-out">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 5l7 7-7 7M5 5l7 7-7 7"></path>
                    </svg>
                    <a class="text-sm" href="{{ $item->link }}">{{ $item->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
