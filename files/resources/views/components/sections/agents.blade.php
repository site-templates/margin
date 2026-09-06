@props([
    'heading' => 'Work carries on without you in the room.',
    'body' => 'An agent reads the note, reads the page it sits on, and does the part that never needed a person. It shows every step, so you are approving work rather than trusting a black box.',
    'linkText' => 'How agents work',
    'link' => '/product#agents',
    'runTitle' => 'Release agent',
    'runNote' => 'Draft the 2.4 changelog from these PRs.',
    'runAuthor' => 'Dara · in Q3 launch brief',
    'runResult' => 'Margin 2.4 — the margin rail arrives. Notes now attach to any block, agents can pick them up, and the changelog you are reading wrote itself.',
    'steps',
])
<!--
    A full-bleed band in the recessed well, and the only two-column section
    on the page: the argument on the left, the agent's actual run on the
    right. The run is taller than the text on purpose — the column edges do
    not line up, which is what stops the page reading as six identical rows.
-->
<section class="bg-well py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <div class="grid gap-12 lg:grid-cols-12 lg:gap-5">

            <div class="lg:col-span-5 lg:self-center">
                <h2 class="display-section max-w-[18ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>
                <p class="mt-5 max-w-[52ch] text-lg/7 text-pretty text-lede" data-reveal>{{ $body }}</p>
                <a href="{{ $link }}" class="text-link mt-7 inline-flex items-center gap-1.5 font-medium text-accent-text hover:gap-2.5" data-reveal>
                    {{ $linkText }}
                    <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.22 4.22a.75.75 0 0 1 1.06 0l3.25 3.25a.75.75 0 0 1 0 1.06l-3.25 3.25a.75.75 0 0 1-1.06-1.06L8.94 8 6.22 5.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"/>
                    </svg>
                </a>
            </div>

            <div class="lg:col-span-6 lg:col-start-7" data-reveal>
                <div class="rounded-xl bg-surface p-6 ring-1 ring-line sm:p-8">

                    <!-- The note that started the run -->
                    <div data-note="coral" class="rounded-lg bg-(--note)/15 p-4">
                        <p class="text-[0.9375rem]/6 text-pretty text-ink">{{ $runNote }}</p>
                        <p class="mt-2 text-xs text-muted">{{ $runAuthor }}</p>
                    </div>

                    <p class="mt-7 text-sm font-medium text-ink">{{ $runTitle }}</p>

                    <ol role="list" class="mt-4 flex flex-col gap-3.5">
                        @foreach ($steps as $step)
                        <li class="flex items-start gap-3">
                            @if ($step->state == 'done')
                            <svg viewBox="0 0 16 16" class="mt-0.5 size-4 shrink-0 fill-accent" aria-label="Done">
                                <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-[0.9375rem]/6 text-pretty text-muted">{{ $step->text }}</span>
                            @else
                            <span class="mt-0.5 size-4 shrink-0 rounded-full ring-1 ring-accent-soft ring-inset" aria-hidden="true"></span>
                            <span class="text-[0.9375rem]/6 text-pretty text-ink">{{ $step->text }}</span>
                            @endif
                        </li>
                        @endforeach
                    </ol>

                    <p class="mt-7 border-t border-line pt-6 text-[0.9375rem]/7 text-pretty text-lede">{{ $runResult }}</p>

                    <div class="mt-6 flex gap-2">
                        <span class="btn-primary btn-sm">Publish</span>
                        <span class="btn-quiet btn-sm">Edit first</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
