@php

    $frameworksLinks = getAcademyFrameworksLinks();

    function affLink($link)
    {
        return $link != 'create-post' ? $link : 'new-post';
    }
    //2do Transformer les submenus en dropdown hover
@endphp

<nav class="flex-col ml-2 border-r border-gray-500">

    <div class="mt-0 w-[99px]">

        <div
            class="mt-1 ml-0 mr-1 py-1 pl-2 pr-3 text-sm text-center">
            <a href="/">Back BLOG</a>
        </div>
        <div
            class="mt-0 ml-0 mr-1 py-0 pb-1 pl-2 pr-3 text-base font-bold text-center rounded {{ request()->is('academy') ? 'bg-gray-700 text-white' : '' }}">
            <a href="/academy">ACADEMY</a>
        </div>
        <div
            class="mt-4 ml-0 pt-1 px-1 text-xs text-center font-bold rounded mr-3 {{ request()->is('tools') ? 'bg-gray-700 text-white' : '' }}">
            <a href="/tools">TOOLS</a>
        </div>
        <div
            class="ml-0 py-1 px-1 text-xs text-center font-bold rounded mr-2 {{ request()->is('langages') ? 'bg-gray-700 text-white' : '' }}">
            <a href="/langages">LANGAGES</a>
        </div>
        <div
            class="ml-0 py-1 px-1 text-xs text-center font-bold rounded mr-2 {{ request()->is('frameworks') ? 'bg-gray-700 text-white' : '' }}">
            <a href="/frameworks">FRAMEWORKS</a>
        </div>
        <div class='x-auto w-full text-center mb-4 pr-3'><small><a href="/t">Quick Test</a></small></div>

        @foreach ($frameworksLinks as $framework => $links)
            <div class="{{ $loop->index ? 'mt-4' : '' }}">{{ strtoupper($framework) }}</div>
            <hr>
            @foreach ($links as $link)
                <div class="my-1">
                    <a href="/framework/{{ $framework }}/{{ $link }}"
                        class="py-1 px-2 rounded my-3 pl-2
                            {{ request()->is('framework/' . $framework . '/' . $link) ? 'bg-gray-700 text-white' : '' }}">{{ ucfirst(str_replace('-', ' ', affLink($link))) }}</a>
                </div>
            @endforeach
        @endforeach

    </div>
</nav>
