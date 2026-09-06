@props([
    'title' => 'An article',
    'description' => '',
    'kicker' => '',
    'kickerLink' => '#',
    'dateLabel' => 'Published',
    'dateFormatted' => '',
    'lengthLabel' => 'Length',
    'readTime' => '',
    'authorLabel' => 'Written by',
    'author' => '',
    'roleLabel' => 'Role',
    'authorRole' => '',
    'authorAvatar' => '',
    'note' => 'amber',
    'currentLink' => '',
    'backText' => 'All posts',
    'backLink' => '/blog',
    'moreHeading' => 'More from the blog',
    'more' => [],
    'current' => '/blog',
])
<!--
    The reading layout, shared by blog posts and customer stories. The
    margin is the page's left column — everything you would normally cram
    under a title lives out there against the rule, and the writing gets a
    clean measure to itself. On a phone the margin folds back above the
    prose, which is where it came from.
-->
<x-layouts.main :title="$title" :description="$description" :current="$current">

    <article class="pt-12 pb-20 sm:pt-16 sm:pb-24">
        <div class="mx-auto max-w-[64rem] px-5 sm:px-8">

            <a href="{{ $backLink }}" class="text-link inline-flex items-center gap-1.5 text-sm font-medium text-muted hover:text-ink">
                <svg viewBox="0 0 16 16" class="size-4 shrink-0 fill-current" aria-hidden="true">
                    <path fill-rule="evenodd" d="M9.78 4.22a.75.75 0 0 1 0 1.06L7.06 8l2.72 2.72a.75.75 0 1 1-1.06 1.06L5.47 8.53a.75.75 0 0 1 0-1.06l3.25-3.25a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"/>
                </svg>
                {{ $backText }}
            </a>

            <div class="mt-10 grid gap-10 lg:grid-cols-[13rem_minmax(0,44rem)] lg:gap-14">

                <!-- The margin: everything about the piece, set against the rule -->
                <div class="lg:sticky lg:top-24 lg:self-start lg:border-r lg:border-line-strong lg:pr-8 lg:text-right">
                    @if ($kicker)
                    <a href="{{ $kickerLink }}" data-note="{{ $note }}" class="text-link inline-flex items-center gap-2 rounded-full bg-(--note)/20 px-3 py-1 text-[0.8125rem] font-medium text-ink">
                        <span class="size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                        {{ $kicker }}
                    </a>
                    @endif
                    <dl class="mt-6 flex flex-col gap-4 text-[0.8125rem]">
                        @if ($dateFormatted)
                        <div>
                            <dt class="font-medium text-ink">{{ $dateLabel }}</dt>
                            <dd class="text-muted">{{ $dateFormatted }}</dd>
                        </div>
                        @endif
                        @if ($readTime)
                        <div>
                            <dt class="font-medium text-ink">{{ $lengthLabel }}</dt>
                            <dd class="text-muted">{{ $readTime }}</dd>
                        </div>
                        @endif
                        @if ($author)
                        <div>
                            <dt class="font-medium text-ink">{{ $authorLabel }}</dt>
                            <dd class="flex items-center gap-2 text-muted lg:flex-row-reverse">
                                <img src="{{ $authorAvatar }}" alt="" width="24" height="24" class="size-6 shrink-0 rounded-full outline-1 -outline-offset-1 outline-black/10">
                                <span class="min-w-0 truncate">{{ $author }}</span>
                            </dd>
                        </div>
                        @endif
                        @if ($authorRole)
                        <div>
                            <dt class="font-medium text-ink">{{ $roleLabel }}</dt>
                            <dd class="text-muted">{{ $authorRole }}</dd>
                        </div>
                        @endif
                    </dl>
                </div>

                <div>
                    <h1 class="font-display text-4xl font-semibold tracking-tight text-pretty text-ink sm:text-5xl">{{ $title }}</h1>
                    @if ($description)
                    <p class="mt-5 font-serif text-xl/8 text-pretty text-lede">{{ $description }}</p>
                    @endif

                    <div class="prose mt-10 max-w-[68ch]">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </article>

    @if ($moreHeading)
    <section class="border-t border-line py-16 sm:py-20">
        <div class="mx-auto max-w-[64rem] px-5 sm:px-8">
            <h2 class="font-display text-2xl font-semibold tracking-tight text-ink">{{ $moreHeading }}</h2>
            <ul role="list" class="mt-8 grid gap-5 md:grid-cols-3">
                @foreach ($more as $item)
                @if ($item->link != $currentLink)
                <li data-note="{{ $item->note }}" class="group rounded-xl bg-surface p-6 ring-1 ring-line">
                    <span class="block h-1 w-8 rounded-full bg-(--note)" aria-hidden="true"></span>
                    <h3 class="mt-4 font-display text-lg font-semibold text-pretty text-ink">
                        <a href="{{ $item->link }}" class="text-link group-hover:text-accent-text">{{ $item->title }}</a>
                    </h3>
                    <p class="mt-2 text-[0.9375rem]/6 text-pretty text-muted">{{ $item->description }}</p>
                </li>
                @endif
                @endforeach
            </ul>
        </div>
    </section>
    @endif

</x-layouts.main>
