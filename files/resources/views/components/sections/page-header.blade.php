@props([
    'heading' => 'A page title',
    'body' => '',
    'showCta' => '0',
    'ctaText' => 'Start free',
    'ctaLink' => '#',
])
<!--
    The opening of every page that is not the homepage. Left-aligned, so it
    lands on the same edge as everything that follows it, and it closes with
    a hairline rather than a colour change.
-->
<section class="pt-16 pb-14 sm:pt-24 sm:pb-16">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <h1 class="display-page max-w-[18ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h1>
        @if ($body)
        <p class="mt-6 max-w-[62ch] text-xl/8 text-pretty text-lede" data-reveal>{{ $body }}</p>
        @endif
        @if ($showCta)
        <div class="mt-8" data-reveal>
            <a href="{{ $ctaLink }}" class="btn-primary btn-lg">{{ $ctaText }}</a>
        </div>
        @endif
    </div>
</section>
