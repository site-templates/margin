@props([
    'heading' => 'Start on the page you are already writing.',
    'body' => 'Free for up to ten people, and your first agent runs on day one.',
    'ctaText' => 'Start free',
    'ctaLink' => '#',
    'showSecondary' => '1',
    'secondaryText' => 'Book a demo',
    'secondaryLink' => '#',
])
<!--
    The close. A white panel on the warm canvas, centred — the only other
    centred block on the page besides the hero, so the two of them bookend
    everything left-aligned in between.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="flex flex-col items-center rounded-xl bg-surface px-6 py-16 text-center ring-1 ring-line sm:py-20" data-reveal>
            <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
            <p class="mt-5 max-w-[48ch] text-lg/7 text-pretty text-lede">{{ $body }}</p>
            <div class="mt-9 flex flex-wrap items-center justify-center gap-3">
                <a href="{{ $ctaLink }}" class="btn-primary btn-lg">{{ $ctaText }}</a>
                @if ($showSecondary)
                <a href="{{ $secondaryLink }}" class="btn-ghost btn-lg">{{ $secondaryText }}</a>
                @endif
            </div>
        </div>
    </div>
</section>
