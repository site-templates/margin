@props([
    'heading' => 'Twenty-nine people, one page.',
    'body' => 'We are small on purpose and write far more than a company this size normally does.',
    'linkText' => 'See the open roles',
    'link' => '#',
    'items',
])
<!--
    The team. Photographs at a comfortable size, one line each in the
    person's own voice, and no cards — the grid and the whitespace do the
    grouping, which is all this content needs.
-->
<section id="careers" class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="border-t border-line pt-12">
            <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>
            <p class="mt-5 max-w-[58ch] text-lg/7 text-pretty text-lede" data-reveal>{{ $body }}</p>
            <a href="{{ $link }}" class="text-link mt-7 inline-flex items-center gap-1.5 font-medium text-accent-text hover:gap-2.5" data-reveal>
                {{ $linkText }}
                <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                </svg>
            </a>

            <ul role="list" class="stagger mt-12 grid grid-cols-2 gap-x-5 gap-y-10 sm:grid-cols-3 lg:grid-cols-4" data-reveal>
                @foreach ($items as $person)
                <li>
                    <img src="{{ $person->avatar }}" alt="" width="200" height="200" class="aspect-square w-full rounded-xl object-cover outline-1 -outline-offset-1 outline-black/10">
                    <p class="mt-4 font-display text-base font-semibold text-ink">{{ $person->name }}</p>
                    <p class="text-[0.9375rem] text-muted">{{ $person->role }}</p>
                    <p class="mt-2 text-[0.875rem]/5 text-pretty text-faint">{{ $person->line }}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
