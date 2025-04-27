@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        <ul class="flex items-center space-x-2">
            
            @if ($paginator->onFirstPage())
                <li class="px-4 py-2 bg-gray-300 text-white rounded-md opacity-50 cursor-not-allowed">‹</li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold rounded-md transition duration-300">‹</a>
                </li>
            @endif

            
            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="px-4 py-2 text-gray-400">{{ $element }}</li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="px-4 py-2 bg-[#5a243c] text-white font-bold rounded-md">{{ $page }}</li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="px-4 py-2 bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold rounded-md transition duration-300">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-[#5a243c] hover:bg-[#4a1d34] text-white font-bold rounded-md transition duration-300">›</a>
                </li>
            @else
                <li class="px-4 py-2 bg-gray-300 text-white rounded-md opacity-50 cursor-not-allowed">›</li>
            @endif
        </ul>
    </nav>
@endif
