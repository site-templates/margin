@props([
    'caption' => 'Written in every day at',
    'items',
])
<!--
    The wall. Logos are set like typography rather than imagery — one even
    row on the desktop, two on a phone, no cards, no borders, nothing but a
    hairline above to separate it from the hero.
-->
<section class="pb-20 sm:pb-24">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="border-t border-line pt-12">
            <p class="text-center text-sm text-faint" data-reveal>{{ $caption }}</p>
            <ul role="list" class="stagger mt-10 grid grid-cols-2 items-center gap-x-8 gap-y-10 sm:grid-cols-4 lg:grid-cols-8" data-reveal>
                @foreach ($items as $item)
                <li class="flex justify-center">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" height="22" class="h-[1.375rem] w-auto opacity-70">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
