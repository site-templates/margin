@props([
    'items',
])
<!--
    The changelog on the rail: the version and the date live out in the
    margin against the rule, the entry sits beside them. It is the same
    device as a post's reading spine and a note in a document, which is the
    point — the margin is where the metadata belongs.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <ol role="list" class="flex flex-col">
            @foreach ($items as $entry)
            <li data-note="{{ $entry->note }}" class="grid gap-4 border-t border-line py-10 first:border-t-0 first:pt-0 lg:grid-cols-[13rem_minmax(0,44rem)] lg:gap-14" data-reveal>
                <div class="lg:border-r lg:border-line-strong lg:pr-8 lg:text-right">
                    <p class="inline-flex items-center gap-2 rounded-full bg-(--note)/20 px-3 py-1 font-display text-sm font-medium text-ink tabular-nums">
                        <span class="size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                        {{ $entry->version }}
                    </p>
                    <p class="mt-3 text-sm text-muted">{{ $entry->dateFormatted }}</p>
                </div>
                <div>
                    <h2 class="font-display text-2xl font-semibold tracking-tight text-pretty text-ink">{{ $entry->title }}</h2>
                    <div class="prose mt-4 max-w-[68ch]">
                        {!! $entry->content !!}
                    </div>
                </div>
            </li>
            @endforeach
        </ol>
    </div>
</section>
