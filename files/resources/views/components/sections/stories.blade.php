@props([
    'items',
])
<!--
    The customer stories. Each one is a painted panel carrying the number
    that mattered, the sentence somebody said, and the way into the full
    piece — alternating which side the figure sits on so three of them do
    not read as three identical rows.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto flex max-w-7xl flex-col gap-5 px-5 sm:px-8">
        @foreach ($items as $story)
        <article data-note="{{ $story->note }}" class="grid gap-8 rounded-xl bg-(--note) p-8 sm:p-12 lg:grid-cols-[1.6fr_1fr] lg:gap-16" data-reveal>
            <div @if ($loop->even) class="lg:order-2" @endif>
                <img src="{{ $story->logo }}" alt="{{ $story->company }}" height="22" class="h-[1.375rem] w-auto opacity-80">
                <h2 class="mt-7 max-w-[24ch] font-display text-3xl font-semibold tracking-tight text-balance text-(--note-ink) sm:text-4xl">
                    <a href="{{ $story->link }}">{{ $story->title }}</a>
                </h2>
                <p class="mt-5 max-w-[56ch] text-lg/7 text-pretty text-(--note-ink)/85">{{ $story->description }}</p>
                <a href="{{ $story->link }}" class="text-link mt-7 inline-flex items-center gap-1.5 font-medium text-(--note-ink) hover:gap-2.5">
                    Read the story
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            @if ($loop->even)
            <div class="flex flex-col gap-10 border-t border-(--note-veil) pt-8 lg:order-1 lg:border-t-0 lg:border-r lg:pt-0 lg:pr-16">
            @else
            <div class="flex flex-col gap-10 border-t border-(--note-veil) pt-8 lg:border-t-0 lg:border-l lg:pt-0 lg:pl-16">
            @endif
                <div>
                    <p class="font-display text-5xl font-semibold tracking-tight text-(--note-ink) tabular-nums">{{ $story->metricValue }}</p>
                    <p class="mt-2 max-w-[22ch] text-[0.9375rem]/6 text-pretty text-(--note-ink)/85">{{ $story->metricLabel }}</p>
                </div>
                <dl class="flex flex-col gap-3 text-[0.9375rem]">
                    <div class="flex justify-between gap-4">
                        <dt class="font-medium text-(--note-ink)">Industry</dt>
                        <dd class="text-right text-(--note-ink)/85">{{ $story->industry }}</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="font-medium text-(--note-ink)">Size</dt>
                        <dd class="text-right text-(--note-ink)/85">{{ $story->size }}</dd>
                    </div>
                    <div class="flex justify-between gap-4">
                        <dt class="font-medium text-(--note-ink)">Using</dt>
                        <dd class="text-right text-(--note-ink)/85">{{ $story->using }}</dd>
                    </div>
                </dl>
            </div>
        </article>
        @endforeach
    </div>
</section>
