@props([
    'heading' => 'How we got here.',
    'bodyOne' => 'Margin started as a stopwatch.',
    'bodyTwo' => 'The rest followed from that number.',
    'items',
])
<!--
    The founding story with its dates out in the margin, on the rule — the
    same device as a post's reading spine, so About feels like a page from
    the product rather than a different website.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="grid gap-10 lg:grid-cols-[13rem_minmax(0,44rem)] lg:gap-14">

            <ol role="list" class="flex flex-col gap-8 lg:border-r lg:border-line-strong lg:pr-8 lg:text-right">
                @foreach ($items as $item)
                <li data-note="{{ $item->note }}" data-reveal>
                    <p class="inline-flex items-center gap-2 rounded-full bg-(--note)/20 px-3 py-1 font-display text-sm font-medium text-ink tabular-nums">
                        <span class="size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                        {{ $item->year }}
                    </p>
                    <p class="mt-3 text-[0.9375rem]/6 text-pretty text-muted">{{ $item->text }}</p>
                </li>
                @endforeach
            </ol>

            <div data-reveal>
                <h2 class="display-section max-w-[18ch] font-display font-semibold text-balance text-ink">{{ $heading }}</h2>
                <p class="mt-6 max-w-[68ch] text-lg/8 text-pretty text-lede">{{ $bodyOne }}</p>
                <p class="mt-5 max-w-[68ch] text-lg/8 text-pretty text-lede">{{ $bodyTwo }}</p>
            </div>
        </div>
    </div>
</section>
