@props([
    'anchor' => 'feature',
    'heading' => 'A capability',
    'body' => 'What it does and why it is here.',
    'linkText' => '',
    'link' => '#',
    'mock' => 'sources',
    'side' => 'right',
    'note' => 'none',
])
<!--
    One capability: the argument on one side, its drawing on the other. The
    side field flips them, and note paints the whole row as a full-bleed
    band — so a page of these reads as a rhythm rather than six identical
    rows. The drawing is a block of its own, editable on the canvas.
-->
@if ($note == 'none')
<section id="{{ $anchor }}" class="py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div @if ($side == 'left') class="lg:order-2" @endif>
                <h2 class="display-section max-w-[18ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>
                <p class="mt-5 max-w-[52ch] text-lg/7 text-pretty text-lede" data-reveal>{{ $body }}</p>
                @if ($linkText)
                <a href="{{ $link }}" class="text-link mt-7 inline-flex items-center gap-1.5 font-medium text-accent-text hover:gap-2.5" data-reveal>
                    {{ $linkText }}
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                @endif
            </div>
            <div class="rounded-xl bg-well p-5 sm:p-8" data-reveal>
                <x-mocks.panel :mock="$mock" />
            </div>
        </div>
    </div>
</section>
@else
<section id="{{ $anchor }}" data-note="{{ $note }}" class="bg-(--note) py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16">
            <div @if ($side == 'left') class="lg:order-2" @endif>
                <h2 class="display-section max-w-[18ch] font-display font-semibold text-balance text-(--note-ink)" data-reveal>{{ $heading }}</h2>
                <p class="mt-5 max-w-[52ch] text-lg/7 text-pretty text-(--note-ink)/85" data-reveal>{{ $body }}</p>
                @if ($linkText)
                <a href="{{ $link }}" class="text-link mt-7 inline-flex items-center gap-1.5 font-medium text-(--note-ink) hover:gap-2.5" data-reveal>
                    {{ $linkText }}
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </a>
                @endif
            </div>
            <div data-reveal>
                <x-mocks.panel :mock="$mock" />
            </div>
        </div>
    </div>
</section>
@endif
