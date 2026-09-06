@props([
    'heading' => 'Six things you stop doing yourself.',
    'body' => 'Not features. The specific jobs a team hands over in the first fortnight.',
    'items',
])
<!--
    The margin rail — this template's signature, doing structural work
    instead of decoration. A hairline rule with a chip hung off it on a
    short connector, exactly the way a note sits in a book's margin. The
    connector draws out from the rule and the chip settles as each one
    scrolls in; with reduced motion they are simply attached.

    Deliberately not a grid of equal cards: a list on a rule reads down the
    page, which is what a list of jobs actually is.
-->
<section class="py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="grid gap-12 lg:grid-cols-[1fr_1.35fr] lg:gap-16">

            <div class="lg:sticky lg:top-28 lg:self-start lg:pt-2">
                <h2 class="display-section max-w-[16ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>
                <p class="mt-5 max-w-[42ch] text-lg/7 text-pretty text-lede" data-reveal>{{ $body }}</p>
            </div>

            <ul role="list" class="rail flex flex-col gap-1">
                @foreach ($items as $item)
                <li data-note="{{ $item->note }}" class="rail-item" data-reveal>
                    <div class="rail-chip rounded-xl bg-surface p-5 ring-1 ring-line">
                        <h3 class="flex items-center gap-2.5 font-display text-base font-semibold text-ink">
                            <span class="size-2.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                            {{ $item->text }}
                        </h3>
                        <p class="mt-2 max-w-[58ch] pl-5 text-[0.9375rem]/6 text-pretty text-muted">{{ $item->detail }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
