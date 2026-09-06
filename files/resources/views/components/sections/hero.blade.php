@props([
    'showMarks' => '1',
    'headingBefore' => 'Where a note in the margin',
    'headingSwipe' => 'becomes',
    'headingAfter' => 'the work.',
    'body' => 'Write the doc, leave a note, let an agent pick it up. In Margin the thinking and the doing stay on the same page.',
    'ctaText' => 'Start free',
    'ctaLink' => '#',
    'showSecondary' => '1',
    'secondaryText' => 'Book a demo',
    'secondaryLink' => '#',
    'hint' => 'Free for up to 10 people. No card needed.',
    'marks',
])
<!--
    The opening statement: a centred stack — the row of ringed marks, the
    headline with one word inside a marker swipe, one sentence, the two
    buttons, and the drawn workspace window standing under all of it.

    The swipe is three fields rather than one so the highlighted word can be
    moved through the sentence without touching any markup.
-->
<section class="pt-16 pb-20 sm:pt-24 sm:pb-24">
    <div class="mx-auto flex w-full max-w-7xl flex-col items-center px-5 text-center sm:px-8">

        @if ($showMarks)
        <ul role="list" class="flex items-center -space-x-2" data-reveal>
            @foreach ($marks as $mark)
            <li data-note="{{ $mark->note }}" class="flex size-11 items-center justify-center rounded-full bg-surface ring-2 ring-(--note)">
                @if ($mark->glyph == 'rule')
                <svg viewBox="0 0 36 24" class="h-3 w-[1.125rem] fill-ink" aria-hidden="true">
                    <rect x="0" y="0" width="4" height="24"/>
                    <rect x="8" y="0" width="28" height="5"/>
                    <rect x="8" y="9.5" width="6" height="5"/>
                    <rect x="8" y="19" width="6" height="5"/>
                    <rect x="30" y="9.5" width="6" height="5"/>
                    <rect x="30" y="19" width="6" height="5"/>
                    <path d="M14.5 5 22 21 29.5 5 24.75 5 22 10.87 19.25 5Z"/>
                </svg>
                @elseif ($mark->glyph == 'check')
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 stroke-ink" aria-hidden="true">
                    <path d="M4.5 12.75 9 17.25 19.5 6.75"/>
                </svg>
                @elseif ($mark->glyph == 'pen')
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 stroke-ink" aria-hidden="true">
                    <path d="M16.5 4.5 19.5 7.5 8.25 18.75 4.5 19.5 5.25 15.75 16.5 4.5Z"/>
                </svg>
                @elseif ($mark->glyph == 'spark')
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 stroke-ink" aria-hidden="true">
                    <path d="M12 3.75 13.9 10.1 20.25 12 13.9 13.9 12 20.25 10.1 13.9 3.75 12 10.1 10.1 12 3.75Z"/>
                </svg>
                @elseif ($mark->glyph == 'page')
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 stroke-ink" aria-hidden="true">
                    <path d="M6 3.75h12v16.5H6V3.75Z"/>
                    <path d="M9.75 8.25h4.5M9.75 12h4.5M9.75 15.75h2.25"/>
                </svg>
                @elseif ($mark->glyph == 'chat')
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 stroke-ink" aria-hidden="true">
                    <path d="M4.5 5.25h15v10.5H10.5L6 19.5v-3.75H4.5V5.25Z"/>
                </svg>
                @else
                <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="size-6 stroke-ink" aria-hidden="true">
                    <path d="M12 4.5a7.5 7.5 0 1 1 0 15 7.5 7.5 0 0 1 0-15Z"/>
                    <path d="M12 8.25V12l2.625 1.875"/>
                </svg>
                @endif
            </li>
            @endforeach
        </ul>
        @endif

        <h1 class="display-hero mt-9 max-w-[19ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $headingBefore }} <span class="swipe">{{ $headingSwipe }}</span> {{ $headingAfter }}</h1>

        <p class="mt-7 max-w-[54ch] text-lg/7 text-pretty text-lede" data-reveal>{{ $body }}</p>

        <div class="mt-9 flex flex-wrap items-center justify-center gap-3" data-reveal>
            <a href="{{ $ctaLink }}" class="btn-primary btn-lg">{{ $ctaText }}</a>
            @if ($showSecondary)
            <a href="{{ $secondaryLink }}" class="btn-ghost btn-lg">{{ $secondaryText }}</a>
            @endif
        </div>

        @if ($hint)
        <p class="mt-4 text-sm text-faint" data-reveal>{{ $hint }}</p>
        @endif

        <div class="mt-16 w-full max-w-6xl" data-reveal>
            <x-mocks.workspace :pages="$pages" :tasks="$tasks" :notes="$notes" />
        </div>

    </div>
</section>
