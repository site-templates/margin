@props([
    'items',
])
<!--
    The blog index. The featured post takes a wide painted panel; the rest
    sit under it in a plain three-up, so the page opens with a shape rather
    than a grid.
-->
<section class="pb-20 sm:pb-28">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">

        @foreach ($items as $post)
        @if ($post->featured)
        <a href="{{ $post->link }}" data-note="{{ $post->note }}" class="group grid gap-8 rounded-xl bg-(--note) p-8 sm:p-12 lg:grid-cols-[1.4fr_1fr] lg:items-end" data-reveal>
            <div>
                <p class="text-sm font-medium text-(--note-ink)/85">{{ $post->category }}</p>
                <h2 class="display-section mt-4 max-w-[20ch] font-display font-semibold text-balance text-(--note-ink)">{{ $post->title }}</h2>
                <p class="mt-5 max-w-[54ch] text-lg/7 text-pretty text-(--note-ink)/85">{{ $post->description }}</p>
            </div>
            <div class="flex items-center gap-3 lg:justify-end">
                <img src="{{ $post->authorAvatar }}" alt="" width="36" height="36" class="size-9 shrink-0 rounded-full outline-1 -outline-offset-1 outline-black/10">
                <span class="min-w-0">
                    <span class="block truncate text-[0.9375rem] font-medium text-(--note-ink)">{{ $post->author }}</span>
                    <span class="block truncate text-[0.8125rem] text-(--note-ink)/85">{{ $post->dateFormatted }} · {{ $post->readTime }}</span>
                </span>
            </div>
        </a>
        @endif
        @endforeach

        <ul role="list" class="stagger mt-5 grid gap-5 md:grid-cols-3" data-reveal>
            @foreach ($items as $post)
            @if ($post->featured)
            @else
            <li data-note="{{ $post->note }}" class="group flex flex-col justify-between rounded-xl bg-surface p-7 ring-1 ring-line">
                <div>
                    <span class="block h-1 w-8 rounded-full bg-(--note)" aria-hidden="true"></span>
                    <p class="mt-5 text-sm text-faint">{{ $post->category }}</p>
                    <h2 class="mt-2 font-display text-xl font-semibold text-pretty text-ink">
                        <a href="{{ $post->link }}" class="text-link group-hover:text-accent-text">{{ $post->title }}</a>
                    </h2>
                    <p class="mt-3 text-[0.9375rem]/6 text-pretty text-muted">{{ $post->description }}</p>
                </div>
                <div class="mt-8 flex items-center gap-3">
                    <img src="{{ $post->authorAvatar }}" alt="" width="32" height="32" class="size-8 shrink-0 rounded-full outline-1 -outline-offset-1 outline-black/10">
                    <span class="min-w-0">
                        <span class="block truncate text-[0.875rem] font-medium text-ink">{{ $post->author }}</span>
                        <span class="block truncate text-[0.8125rem] text-faint">{{ $post->dateFormatted }} · {{ $post->readTime }}</span>
                    </span>
                </div>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</section>
