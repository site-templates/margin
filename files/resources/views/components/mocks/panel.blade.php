@props([
    'mock' => 'sources',
    'pageTitle' => 'Q3 launch brief',
    'pageLine' => 'Everything that has to be true before the 14th, and who owns it.',
    'searchQuery' => 'why did we move pricing to usage?',
    'searchAnswer' => 'Because seats punished the teams inviting the most people. Usage tracks the value they actually get.',
    'searchCitation' => 'Pricing rewrite · line 14',
    'noteText' => 'This paragraph is doing two jobs. Split it.',
    'noteAuthor' => 'Priya',
    'noteBody' => 'Usage pricing means a team of forty pays for what forty people actually did, not for forty seats. It is the only model that does not punish you for inviting the person who needed to read it.',
    'agentName' => 'Support agent',
    'agentLine' => 'Answered 14 tickets from the runbook. Three needed a person — they are in your inbox with the context attached.',
    'sources',
    'board',
    'connections',
])
<!--
    The drawing that sits inside a painted panel. One component, three
    drawings, chosen by the mock field — sources folding into a page, a
    search answering with the line it read, and a board of notes. All of it
    is markup, so it is sharp at any width and free to restyle.

    Each drawing sits on a white card that runs off the bottom of its panel,
    which is why only the top corners are rounded.
-->
@if ($mock == 'notes')
<div class="rounded-t-xl bg-surface p-5 sm:p-6">
    <div class="grid gap-4 sm:grid-cols-[9rem_1fr] sm:gap-0">
        <div data-note="amber" class="flex sm:justify-end sm:border-r sm:border-line-strong sm:pr-5">
            <span class="w-full max-w-[9rem] rounded-md bg-(--note)/15 p-2.5">
                <span class="flex items-start gap-1.5">
                    <span class="mt-1 size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                    <span class="text-[0.6875rem]/4 text-lede">{{ $noteText }}</span>
                </span>
                <span class="mt-1.5 block pl-3 text-[0.625rem] text-muted">{{ $noteAuthor }}</span>
            </span>
        </div>
        <p class="text-[0.8125rem]/6 text-pretty text-muted sm:pl-6">{{ $noteBody }}</p>
    </div>
</div>
@elseif ($mock == 'agent')
<div class="rounded-t-xl bg-surface p-5 sm:p-6">
    <div class="flex items-center gap-2">
        <span data-note="coral" class="size-6 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
        <p class="min-w-0 flex-1 truncate text-sm font-medium text-ink">{{ $agentName }}</p>
        <span class="shrink-0 rounded-full bg-accent-wash px-2 py-0.5 text-[0.6875rem] font-medium text-accent-text">Done</span>
    </div>
    <p class="mt-4 text-[0.8125rem]/6 text-pretty text-lede">{{ $agentLine }}</p>
    <p class="mt-4 flex items-center gap-1.5 text-[0.6875rem] text-faint">
        <span class="h-3 w-px shrink-0 bg-line-strong" aria-hidden="true"></span>
        Ran at 06:40, before anyone was up
    </p>
</div>
@elseif ($mock == 'connections')
<div class="rounded-t-xl bg-surface p-5 sm:p-6">
    <ul role="list" class="flex flex-col">
        @foreach ($connections as $item)
        <li data-note="{{ $item->note }}" class="flex items-center gap-3 border-t border-line py-2.5 first:border-t-0 first:pt-0">
            <span class="size-6 shrink-0 rounded-md bg-(--note)" aria-hidden="true"></span>
            <span class="min-w-0 flex-1">
                <span class="block truncate text-[0.8125rem] font-medium text-ink">{{ $item->text }}</span>
                <span class="block truncate text-[0.6875rem] text-muted">{{ $item->detail }}</span>
            </span>
            @if ($item->state == 'Connected')
            <span class="shrink-0 rounded-full bg-accent-wash px-2 py-0.5 text-[0.6875rem] font-medium text-accent-text">{{ $item->state }}</span>
            @else
            <span class="shrink-0 rounded-full bg-well px-2 py-0.5 text-[0.6875rem] font-medium text-muted">{{ $item->state }}</span>
            @endif
        </li>
        @endforeach
    </ul>
</div>
@elseif ($mock == 'search')
<div class="rounded-t-xl bg-surface p-5 sm:p-6">
    <div class="flex items-center gap-2.5 rounded-lg bg-well px-3 py-2.5">
        <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-faint" aria-hidden="true">
            <path fill-rule="evenodd" d="M7 2.5a4.5 4.5 0 1 0 2.71 8.09l2.6 2.6a.75.75 0 1 0 1.06-1.06l-2.6-2.6A4.5 4.5 0 0 0 7 2.5ZM4 7a3 3 0 1 1 6 0 3 3 0 0 1-6 0Z" clip-rule="evenodd"/>
        </svg>
        <p class="min-w-0 flex-1 truncate text-[0.8125rem] text-ink">{{ $searchQuery }}</p>
    </div>
    <p class="mt-4 text-[0.8125rem]/6 text-pretty text-lede">{{ $searchAnswer }}</p>
    <p class="mt-4 inline-flex items-center gap-2 rounded-md bg-accent-wash px-2.5 py-1.5 text-[0.6875rem] font-medium text-accent-text">
        <span class="h-3 w-px shrink-0 bg-accent-soft" aria-hidden="true"></span>
        {{ $searchCitation }}
    </p>
</div>
@elseif ($mock == 'board')
<div class="grid grid-cols-3 gap-2 rounded-t-xl bg-surface p-4 sm:p-5">
    <div>
        <p class="px-1 pb-2 text-[0.6875rem] font-medium text-faint">To do</p>
        <ul role="list" class="flex flex-col gap-2">
            @foreach ($board as $card)
            @if ($card->column == 'To do')
            <li data-note="{{ $card->note }}" class="rounded-md bg-canvas p-2 ring-1 ring-line">
                <span class="block h-1 w-6 rounded-full bg-(--note)" aria-hidden="true"></span>
                <span class="mt-1.5 block text-[0.6875rem]/4 text-ink">{{ $card->text }}</span>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    <div>
        <p class="px-1 pb-2 text-[0.6875rem] font-medium text-faint">Doing</p>
        <ul role="list" class="flex flex-col gap-2">
            @foreach ($board as $card)
            @if ($card->column == 'Doing')
            <li data-note="{{ $card->note }}" class="rounded-md bg-canvas p-2 ring-1 ring-line">
                <span class="block h-1 w-6 rounded-full bg-(--note)" aria-hidden="true"></span>
                <span class="mt-1.5 block text-[0.6875rem]/4 text-ink">{{ $card->text }}</span>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
    <div>
        <p class="px-1 pb-2 text-[0.6875rem] font-medium text-faint">Done</p>
        <ul role="list" class="flex flex-col gap-2">
            @foreach ($board as $card)
            @if ($card->column == 'Done')
            <li data-note="{{ $card->note }}" class="rounded-md bg-canvas p-2 ring-1 ring-line">
                <span class="block h-1 w-6 rounded-full bg-(--note)" aria-hidden="true"></span>
                <span class="mt-1.5 block text-[0.6875rem]/4 text-faint line-through">{{ $card->text }}</span>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</div>
@else
<div class="rounded-t-xl bg-surface p-5 sm:p-6">
    <div class="grid grid-cols-[1fr_1.2fr] gap-0">
        <ul role="list" class="flex flex-col gap-2.5 border-r border-line-strong pr-4 text-right">
            @foreach ($sources as $source)
            <li data-note="{{ $source->note }}" class="inline-flex items-center justify-end gap-2 self-end rounded-md bg-(--note)/15 px-2 py-1.5">
                <span class="text-[0.6875rem] text-lede">{{ $source->text }}</span>
                <span class="size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
            </li>
            @endforeach
        </ul>
        <div class="pl-5">
            <p class="text-[0.8125rem] font-semibold text-ink">{{ $pageTitle }}</p>
            <p class="mt-1.5 text-[0.6875rem]/4 text-pretty text-muted">{{ $pageLine }}</p>
            <span class="ruled mt-4 block h-16 [--rule-gap:0.875rem]" aria-hidden="true"></span>
        </div>
    </div>
</div>
@endif
