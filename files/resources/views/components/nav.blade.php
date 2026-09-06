@props([
    'brand' => 'Margin',
    'links' => [],
    'product' => [],
    'productLabel' => 'Product',
    'current' => '/',
    'signInText' => 'Log in',
    'signInLink' => '#',
    'ctaText' => 'Start free',
    'ctaLink' => '#',
])
<!--
    The site-wide header. It sits on the warm canvas with no rule at all
    until the page scrolls, then grows a hairline and a soft shadow. The
    page links come from nav_links in resources/data/site.json and the
    Product menu from product_links, so one edit changes every page. The
    menu opens on hover and keyboard focus with no script; main.js adds the
    tap toggle for touch screens and the phone menu.
-->
<header id="header" class="sticky top-0 z-50">
    <div class="header-bar border-b border-transparent bg-canvas">
        <div class="mx-auto flex h-16 max-w-7xl items-center px-5 sm:px-8">

            <!-- href="/" always points to your site's root, in preview and when published -->
            <div class="flex flex-1 items-center">
                <a href="/" aria-label="Homepage" class="text-link flex shrink-0 items-center gap-2.5 text-ink">
                    <svg viewBox="0 0 36 24" class="h-4 w-6 shrink-0 fill-current" aria-hidden="true">
                        <rect x="0" y="0" width="4" height="24"/>
                        <rect x="8" y="0" width="28" height="5"/>
                        <rect x="8" y="9.5" width="6" height="5"/>
                        <rect x="8" y="19" width="6" height="5"/>
                        <rect x="30" y="9.5" width="6" height="5"/>
                        <rect x="30" y="19" width="6" height="5"/>
                        <path d="M14.5 5 22 21 29.5 5 24.75 5 22 10.87 19.25 5Z"/>
                    </svg>
                    <span class="text-[1.0625rem] font-semibold tracking-tight">{{ $brand }}</span>
                </a>
            </div>

            <nav class="text-[0.9375rem] font-medium max-lg:hidden" aria-label="Main">
                <ul role="list" class="flex items-center gap-0.5">
                    <li class="nav-item relative" data-nav-item>
                        <button type="button" class="flex items-center gap-1 rounded-lg py-2 pr-2 pl-3 text-lede hover:text-ink" aria-expanded="false" aria-haspopup="true" data-nav-toggle>
                            {{ $productLabel }}
                            <svg viewBox="0 0 16 16" class="nav-chevron size-4 shrink-0 fill-current" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                        <div class="nav-menu absolute top-full left-1/2 -translate-x-1/2 pt-2">
                            <ul role="list" class="grid w-[36rem] grid-cols-2 gap-1 rounded-xl bg-surface p-2 ring-1 ring-line-strong shadow-window">
                                @foreach ($product as $link)
                                <li data-note="{{ $link->note }}">
                                    <a href="{{ $link->url }}" class="flex items-start gap-3 rounded-lg p-3 hover:bg-well">
                                        <span class="mt-1.5 size-2.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                                        <span class="flex min-w-0 flex-col gap-0.5">
                                            <span class="text-ink">{{ $link->text }}</span>
                                            <span class="text-[0.8125rem] font-normal text-muted">{{ $link->description }}</span>
                                        </span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @foreach ($links as $link)
                    <li>
                        @if ($link->url == $current)
                        <a href="{{ $link->url }}" aria-current="page" class="block rounded-lg px-3 py-2 text-ink">{{ $link->text }}</a>
                        @else
                        <a href="{{ $link->url }}" class="block rounded-lg px-3 py-2 text-lede hover:text-ink">{{ $link->text }}</a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </nav>

            <div class="flex flex-1 items-center justify-end gap-1 text-[0.9375rem] font-medium">
                <a href="{{ $signInLink }}" class="text-link rounded-lg px-3 py-2 text-lede hover:text-ink max-sm:hidden">{{ $signInText }}</a>

                <a href="{{ $ctaLink }}" class="btn-primary btn-sm">{{ $ctaText }}</a>

                <button type="button" data-menu-toggle aria-expanded="false" aria-controls="mobile-menu" aria-label="Menu" class="relative ml-1 flex size-9 items-center justify-center rounded-lg text-ink hover:bg-well lg:hidden">
                    <span class="absolute top-1/2 left-1/2 size-[max(100%,3rem)] -translate-1/2 pointer-fine:hidden" aria-hidden="true"></span>
                    <svg viewBox="0 0 20 20" class="menu-icon-open size-5 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75Zm0 10.5a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75ZM2 10a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 10Z" clip-rule="evenodd"/>
                    </svg>
                    <svg viewBox="0 0 20 20" class="menu-icon-close size-5 fill-current" aria-hidden="true">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- The phone menu. Hidden until the hamburger sets data-menu-open on the header. -->
    <div id="mobile-menu" class="border-b border-line bg-surface lg:hidden">
        <nav class="mx-auto max-w-7xl px-5 py-3 sm:px-8" aria-label="Main, mobile">
            <ul role="list" class="flex flex-col text-base font-medium">
                @foreach ($product as $link)
                <li data-note="{{ $link->note }}">
                    <a href="{{ $link->url }}" class="flex items-center gap-3 rounded-lg px-3 py-3 text-lede hover:bg-well hover:text-ink">
                        <span class="size-2.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                        {{ $link->text }}
                    </a>
                </li>
                @endforeach
                @foreach ($links as $link)
                <li class="first:mt-2 first:border-t first:border-line first:pt-2">
                    @if ($link->url == $current)
                    <a href="{{ $link->url }}" aria-current="page" class="block rounded-lg px-3 py-3 text-ink">{{ $link->text }}</a>
                    @else
                    <a href="{{ $link->url }}" class="block rounded-lg px-3 py-3 text-lede hover:bg-well hover:text-ink">{{ $link->text }}</a>
                    @endif
                </li>
                @endforeach
                <li class="mt-2 border-t border-line pt-2 sm:hidden">
                    <a href="{{ $signInLink }}" class="block rounded-lg px-3 py-3 text-lede hover:bg-well hover:text-ink">{{ $signInText }}</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
