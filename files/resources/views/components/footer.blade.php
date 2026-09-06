@props([
    'brand' => 'Margin',
    'quote' => 'We shape our tools, and thereafter our tools shape us.',
    'quoteAuthor' => 'Marshall McLuhan',
    'columns' => [],
    'legal' => '© 2026 Margin Labs, Inc.',
    'legalLinks' => [],
])
<!--
    The footer closes every page: the mark and a line worth reading on the
    left, the link columns on the right, and one hairline above the legal
    row. Columns come from footer_columns in resources/data/site.json — a
    nestable repeater, so a column heading is a link with children.
-->
<footer class="border-t border-line bg-canvas">
    <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8">
        <div class="grid gap-12 lg:grid-cols-[20rem_1fr] lg:gap-5">

            <div>
                <a href="/" aria-label="Homepage" class="text-link flex w-fit items-center gap-2.5 text-ink">
                    <svg viewBox="0 0 36 24" class="h-5 w-[1.875rem] shrink-0 fill-current" aria-hidden="true">
                        <rect x="0" y="0" width="4" height="24"/>
                        <rect x="8" y="0" width="28" height="5"/>
                        <rect x="8" y="9.5" width="6" height="5"/>
                        <rect x="8" y="19" width="6" height="5"/>
                        <rect x="30" y="9.5" width="6" height="5"/>
                        <rect x="30" y="19" width="6" height="5"/>
                        <path d="M14.5 5 22 21 29.5 5 24.75 5 22 10.87 19.25 5Z"/>
                    </svg>
                    <span class="text-xl font-semibold tracking-tight">{{ $brand }}</span>
                </a>

                <blockquote class="mt-8 max-w-[34ch] font-serif text-lg/7 text-pretty text-lede">{{ $quote }}</blockquote>
                <p class="mt-3 text-sm text-faint">{{ $quoteAuthor }}</p>
            </div>

            <div class="grid grid-cols-2 gap-8 sm:grid-cols-4 sm:gap-5">
                @foreach ($columns as $column)
                <div>
                    <h2 class="font-display text-sm font-medium text-ink">{{ $column->text }}</h2>
                    <ul role="list" class="mt-4 flex flex-col gap-3 text-[0.9375rem]">
                        @foreach ($column->children as $link)
                        <li>
                            <a href="{{ $link->url }}" class="text-link font-normal text-muted hover:text-ink">{{ $link->text }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-16 flex flex-col gap-4 border-t border-line pt-8 sm:flex-row sm:items-center sm:justify-between">
            <p class="text-sm text-faint">{{ $legal }}</p>
            <ul role="list" class="flex flex-wrap gap-x-6 gap-y-2 text-sm">
                @foreach ($legalLinks as $link)
                <li>
                    <a href="{{ $link->url }}" class="text-link text-faint hover:text-ink">{{ $link->text }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</footer>
