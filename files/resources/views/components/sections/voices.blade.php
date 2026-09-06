@props([
    'heading' => 'Teams that write things down.',
    'items',
])
<!--
    Three painted quote cards, tall, in the note hues. The quote is set in
    the serif — the one place on the site where it earns its keep — and the
    attribution is pushed to the foot of every card so the three names line
    up however long the quotes run.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">

        <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>

        <ul role="list" class="stagger mt-12 grid gap-5 md:grid-cols-3" data-reveal>
            @foreach ($items as $item)
            <li data-note="{{ $item->note }}" class="flex min-h-[22rem] flex-col justify-between rounded-xl bg-(--note) p-7">
                <img src="{{ $item->logo }}" alt="{{ $item->company }}" height="20" class="h-5 w-auto self-start opacity-70">
                <div>
                    <blockquote class="font-serif text-xl/7 text-pretty text-(--note-ink)">
                        <p class="relative before:absolute before:inline before:-translate-x-full before:content-['\201C'] after:inline after:content-['\201D']">{{ $item->quote }}</p>
                    </blockquote>
                    <div class="mt-7 flex items-center gap-3">
                        <img src="{{ $item->avatar }}" alt="" width="40" height="40" class="size-10 shrink-0 rounded-full outline-1 -outline-offset-1 outline-black/10">
                        <div class="min-w-0">
                            <p class="truncate text-[0.9375rem] font-medium text-(--note-ink)">{{ $item->name }}</p>
                            <p class="truncate text-[0.8125rem] text-(--note-ink)/85">{{ $item->role }}</p>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</section>
