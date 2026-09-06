@props([
    'tabLabel' => 'Q3 launch brief',
    'workspace' => 'Margin HQ',
    'docTitle' => 'Q3 launch brief',
    'docLead' => 'We ship the margin rail on the 14th. Everything below is what has to be true by then — write straight into it, and leave a note wherever you want help.',
    'docHeading' => 'Before we ship',
    'agentName' => 'Release agent',
    'agentStatus' => 'Working',
    'agentMessage' => 'I picked up Dara’s note. The 2.4 changelog is drafted from the three merged PRs and it reads clean. Publish it?',
    'agentSource' => 'Reading: Q3 launch brief',
    'pages',
    'tasks',
    'notes',
])
<!--
    The Margin workspace, drawn entirely in markup — no screenshot, so it
    stays razor sharp at any width and restyles with the tokens for free.

    The document is a two-column grid: the margin on the left holding the
    notes, the writing on the right, one hairline between them. That rule is
    the product, so it is the first thing the hero shows. Below md the
    sidebars fall away and the notes stack above the writing as chips.
-->
<div class="overflow-hidden rounded-xl bg-surface text-left ring-1 ring-line shadow-window">

    <!-- Window chrome -->
    <div class="flex h-11 items-center gap-3 border-b border-line px-4">
        <span class="flex gap-1.5" aria-hidden="true">
            <span class="size-2.5 rounded-full bg-line-strong"></span>
            <span class="size-2.5 rounded-full bg-line-strong"></span>
            <span class="size-2.5 rounded-full bg-line-strong"></span>
        </span>
        <span class="flex items-center gap-2 rounded-md bg-well px-2.5 py-1 text-xs font-medium text-lede">
            <svg viewBox="0 0 36 24" class="h-2.5 w-[0.9375rem] shrink-0 fill-current" aria-hidden="true">
                <rect x="0" y="0" width="4" height="24"/>
                <rect x="8" y="0" width="28" height="5"/>
                <rect x="8" y="9.5" width="6" height="5"/>
                <rect x="8" y="19" width="6" height="5"/>
                <rect x="30" y="9.5" width="6" height="5"/>
                <rect x="30" y="19" width="6" height="5"/>
                <path d="M14.5 5 22 21 29.5 5 24.75 5 22 10.87 19.25 5Z"/>
            </svg>
            {{ $tabLabel }}
        </span>
        <span class="text-xs text-faint max-sm:hidden">Edited just now</span>
    </div>

    <div class="grid md:grid-cols-[13rem_1fr] lg:grid-cols-[13rem_1fr_16rem]">

        <!-- Sidebar -->
        <div class="border-r border-line p-3 max-md:hidden">
            <p class="px-2 py-1 text-xs font-medium text-faint">{{ $workspace }}</p>
            <ul role="list" class="mt-2 flex flex-col gap-0.5 text-[0.8125rem]">
                @foreach ($pages as $page)
                <li data-note="{{ $page->note }}">
                    @if ($page->active)
                    <span class="flex items-center gap-2 rounded-md bg-well px-2 py-1.5 font-medium text-ink">
                        <span class="size-2 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                        <span class="truncate">{{ $page->text }}</span>
                    </span>
                    @else
                    <span class="flex items-center gap-2 rounded-md px-2 py-1.5 text-muted">
                        <span class="size-2 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                        <span class="truncate">{{ $page->text }}</span>
                    </span>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>

        <!-- The document, and its margin -->
        <div class="p-5 sm:p-7">
            <div class="grid gap-4 md:grid-cols-[9rem_1fr] md:gap-0">

                <!-- Row one: the first note, the title and the lead -->
                <div class="flex md:justify-end md:border-r md:border-line-strong md:pr-5 md:pb-8">
                    @foreach ($notes as $note)
                    @if ($loop->first)
                    <span data-note="{{ $note->note }}" class="w-full max-w-[9rem] rounded-md bg-(--note)/15 p-2.5">
                        <span class="flex items-start gap-1.5">
                            <span class="mt-1 size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                            <span class="text-[0.6875rem]/4 text-lede">{{ $note->text }}</span>
                        </span>
                        <span class="mt-1.5 block pl-3 text-[0.625rem] text-muted">{{ $note->author }}</span>
                    </span>
                    @endif
                    @endforeach
                </div>
                <div class="md:pb-8 md:pl-6">
                    <h3 class="font-display text-xl font-semibold tracking-tight text-ink">{{ $docTitle }}</h3>
                    <p class="mt-2 text-[0.8125rem]/6 text-pretty text-muted">{{ $docLead }}</p>
                </div>

                <!-- Row two: the second note, the heading and the checklist -->
                <div class="flex md:justify-end md:border-r md:border-line-strong md:pr-5 md:pb-8">
                    @foreach ($notes as $note)
                    @if ($loop->index == 1)
                    <span data-note="{{ $note->note }}" class="w-full max-w-[9rem] rounded-md bg-(--note)/15 p-2.5">
                        <span class="flex items-start gap-1.5">
                            <span class="mt-1 size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                            <span class="text-[0.6875rem]/4 text-lede">{{ $note->text }}</span>
                        </span>
                        <span class="mt-1.5 block pl-3 text-[0.625rem] text-muted">{{ $note->author }}</span>
                    </span>
                    @endif
                    @endforeach
                </div>
                <div class="md:pb-8 md:pl-6">
                    <h4 class="font-display text-sm font-semibold text-ink">{{ $docHeading }}</h4>
                    <ul role="list" class="mt-2.5 flex flex-col gap-1.5 text-[0.8125rem]">
                        @foreach ($tasks as $task)
                        <li class="flex items-center gap-2.5">
                            @if ($task->state == 'done')
                            <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-accent" aria-label="Done">
                                <path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16Zm3.857-9.809a.75.75 0 0 0-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089l4-5.5Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="min-w-0 flex-1 truncate text-faint line-through">{{ $task->text }}</span>
                            @else
                            <span class="size-4 shrink-0 rounded-full ring-1 ring-line-strong ring-inset" aria-hidden="true"></span>
                            <span class="min-w-0 flex-1 truncate text-ink">{{ $task->text }}</span>
                            @endif
                            @if ($task->state == 'doing')
                            <span class="shrink-0 rounded-full bg-accent-wash px-2 py-0.5 text-[0.6875rem] font-medium text-accent-text">{{ $task->owner }}</span>
                            @else
                            <span class="shrink-0 rounded-full bg-well px-2 py-0.5 text-[0.6875rem] text-muted">{{ $task->owner }}</span>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Row three: the last note and the line still being written -->
                <div class="flex md:justify-end md:border-r md:border-line-strong md:pr-5">
                    @foreach ($notes as $note)
                    @if ($loop->index == 2)
                    <span data-note="{{ $note->note }}" class="w-full max-w-[9rem] rounded-md bg-(--note)/15 p-2.5">
                        <span class="flex items-start gap-1.5">
                            <span class="mt-1 size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                            <span class="text-[0.6875rem]/4 text-lede">{{ $note->text }}</span>
                        </span>
                        <span class="mt-1.5 block pl-3 text-[0.625rem] text-muted">{{ $note->author }}</span>
                    </span>
                    @endif
                    @endforeach
                </div>
                <div class="md:pl-6">
                    <p class="text-[0.8125rem]/6 text-muted">Pricing lands with the release, so the sign-off has to come before Friday<span class="caret ml-0.5 inline-block h-4 w-px translate-y-0.5 bg-accent" aria-hidden="true"></span></p>
                </div>
            </div>
        </div>

        <!-- The agent panel -->
        <div class="border-l border-line bg-canvas p-4 max-lg:hidden">
            <div class="flex items-center gap-2">
                <span data-note="coral" class="flex size-6 shrink-0 items-center justify-center rounded-full bg-(--note)" aria-hidden="true">
                    <svg viewBox="0 0 16 16" class="size-3.5 fill-white">
                        <path d="M8 1.5a.75.75 0 0 1 .75.75V3h1.75A2.5 2.5 0 0 1 13 5.5v5A2.5 2.5 0 0 1 10.5 13h-5A2.5 2.5 0 0 1 3 10.5v-5A2.5 2.5 0 0 1 5.5 3h1.75v-.75A.75.75 0 0 1 8 1.5ZM6 6.5a.75.75 0 0 0 0 1.5h.01a.75.75 0 0 0 0-1.5H6Zm3.99 0a.75.75 0 0 0 0 1.5H10a.75.75 0 0 0 0-1.5h-.01ZM6 10h4a.75.75 0 0 0 0-1.5H6A.75.75 0 0 0 6 10Z"/>
                    </svg>
                </span>
                <p class="min-w-0 flex-1 truncate text-sm font-medium text-ink">{{ $agentName }}</p>
                <span class="shrink-0 rounded-full bg-accent-wash px-2 py-0.5 text-[0.6875rem] font-medium text-accent-text">{{ $agentStatus }}</span>
            </div>

            <p class="mt-4 rounded-lg bg-surface p-3 text-[0.8125rem]/6 text-pretty text-lede ring-1 ring-line">{{ $agentMessage }}</p>

            <p class="mt-3 flex items-center gap-1.5 text-[0.6875rem] text-faint">
                <span class="h-3 w-px shrink-0 bg-line-strong" aria-hidden="true"></span>
                {{ $agentSource }}
            </p>

            <div class="mt-4 flex gap-2">
                <span class="rounded-md bg-accent px-2.5 py-1 text-[0.75rem] font-medium text-accent-ink">Publish</span>
                <span class="rounded-md bg-well px-2.5 py-1 text-[0.75rem] font-medium text-lede">Edit first</span>
            </div>
        </div>
    </div>
</div>
