@props([
    'heading' => 'Everything the team knows, on one page.',
    'body' => 'Margin holds the writing, the work and the conversation about both — so the answer is never three tools away.',
    'items',
])
<!--
    The painted panels. One wide one on top, two beneath it — the panel sets
    data-note once and everything inside reads var(--note), so a colour
    change is one word in the collection.

    Each panel carries a drawing rather than a screenshot: the sources
    folding into a page, a search answering with its citation, and a board
    of notes. They are markup, so they stay sharp and restyle for free.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">

        <h2 class="display-section max-w-[24ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>
        <p class="mt-5 max-w-[62ch] text-lg/7 text-pretty text-lede" data-reveal>{{ $body }}</p>

        <div class="stagger mt-12 grid gap-5 lg:grid-cols-2" data-reveal>
            @foreach ($items as $item)
            @if ($item->wide)
            <div data-note="{{ $item->note }}" class="flex flex-col gap-8 overflow-hidden rounded-xl bg-(--note) p-7 sm:p-9 lg:col-span-2 lg:flex-row lg:items-center lg:gap-10 lg:pr-0 lg:pb-0">
                <div class="lg:w-[38%] lg:shrink-0 lg:pb-9">
                    <h3 class="display-card max-w-[22ch] font-display font-semibold text-balance text-(--note-ink)">{{ $item->title }}</h3>
                    <p class="mt-4 max-w-[46ch] text-[0.9375rem]/6 text-pretty text-(--note-ink)/85">{{ $item->body }}</p>
                    <a href="{{ $item->link }}" class="text-link mt-6 inline-flex items-center gap-1.5 text-[0.9375rem] font-medium text-(--note-ink) hover:gap-2.5">
                        {{ $item->linkText }}
                        <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
                <div class="min-w-0 flex-1 lg:self-end">
                    <x-mocks.panel :mock="$item->mock" />
                </div>
            </div>
            @else
            <div data-note="{{ $item->note }}" class="flex flex-col gap-8 rounded-xl bg-(--note) p-7 sm:p-9">
                <div>
                    <h3 class="display-card max-w-[22ch] font-display font-semibold text-balance text-(--note-ink)">{{ $item->title }}</h3>
                    <p class="mt-4 max-w-[46ch] text-[0.9375rem]/6 text-pretty text-(--note-ink)/85">{{ $item->body }}</p>
                    <a href="{{ $item->link }}" class="text-link mt-6 inline-flex items-center gap-1.5 text-[0.9375rem] font-medium text-(--note-ink) hover:gap-2.5">
                        {{ $item->linkText }}
                        <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                            <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                </div>
                <div class="mt-auto">
                    <x-mocks.panel :mock="$item->mock" />
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>
