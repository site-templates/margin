@props([
    'items',
])
<!--
    The figures. No cards, no icons, no dividers — a big number against a
    small label carries its own contrast, so whitespace and one hairline
    above the row are the whole treatment.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <dl class="stagger grid grid-cols-2 gap-x-8 gap-y-10 border-t border-line pt-12 lg:grid-cols-4" data-reveal>
            @foreach ($items as $item)
            <div>
                <dt class="font-display text-4xl font-semibold tracking-tight text-ink tabular-nums sm:text-5xl">{{ $item->value }}</dt>
                <dd class="mt-3 max-w-[24ch] text-[0.9375rem]/6 text-pretty text-muted">{{ $item->label }}</dd>
            </div>
            @endforeach
        </dl>
    </div>
</section>
