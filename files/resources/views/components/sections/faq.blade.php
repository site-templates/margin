@props([
    'heading' => 'The questions people actually ask.',
    'items',
])
<!--
    One open at a time, handled by main.js. Without it the details elements
    still open — nothing here depends on the script to be usable.
-->
<section class="pb-16 sm:pb-20">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="grid gap-10 lg:grid-cols-[1fr_1.5fr] lg:gap-16">
            <h2 class="display-section max-w-[16ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>

            <div class="flex flex-col" data-faq data-reveal>
                @foreach ($items as $item)
                <details class="group border-b border-line first:border-t">
                    <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-left">
                        <h3 class="font-display text-lg font-medium text-pretty text-ink">{{ $item->question }}</h3>
                        <svg viewBox="0 0 16 16" class="faq-chevron size-4 shrink-0 fill-faint" aria-hidden="true">
                            <path fill-rule="evenodd" d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                        </svg>
                    </summary>
                    <div class="faq-answer">
                        <div>
                            <p class="max-w-[68ch] pb-5 text-[1.0625rem]/7 text-pretty text-lede">{{ $item->answer }}</p>
                        </div>
                    </div>
                </details>
                @endforeach
            </div>
        </div>
    </div>
</section>
