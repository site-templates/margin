@props([
    'monthlyLabel' => 'Monthly',
    'yearlyLabel' => 'Yearly',
    'saveLabel' => 'Two months free',
    'popularLabel' => 'Most teams start here',
    'tiers',
    'planFeatures',
])
<!--
    Three plans as grid siblings. The emphasised one is not a different
    colour and it is not lifted out of the row — it says so in words and it
    is the only filled button, which is the whole emphasis it needs.

    Both prices are in the markup; data-period on the section decides which
    one shows, so the toggle costs no layout and works before the script
    loads.
-->
<section class="pb-16 sm:pb-20" data-pricing data-period="monthly">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">

        <div class="flex flex-wrap items-center gap-4">
            <div class="flex items-center gap-1 rounded-full bg-well p-1" role="group" aria-label="Billing period">
                <button type="button" data-period-choice="monthly" aria-pressed="true" class="tap rounded-full px-4 py-1.5 text-sm font-medium text-lede aria-pressed:bg-surface aria-pressed:text-ink">{{ $monthlyLabel }}</button>
                <button type="button" data-period-choice="yearly" aria-pressed="false" class="tap rounded-full px-4 py-1.5 text-sm font-medium text-lede aria-pressed:bg-surface aria-pressed:text-ink">{{ $yearlyLabel }}</button>
            </div>
            <p class="text-sm text-faint">{{ $saveLabel }}</p>
        </div>

        <div class="stagger mt-10 grid gap-5 lg:grid-cols-3" data-reveal>
            @foreach ($tiers as $tier)
            <div class="flex flex-col justify-between rounded-xl bg-surface p-7 ring-1 ring-line">
                <div>
                    <div class="flex items-baseline justify-between gap-3">
                        <h2 class="font-display text-lg font-semibold text-ink">{{ $tier->name }}</h2>
                        @if ($tier->popular)
                        <p class="text-sm font-medium text-accent-text">{{ $popularLabel }}</p>
                        @endif
                    </div>
                    <p class="mt-2 text-[0.9375rem]/6 text-pretty text-muted">{{ $tier->description }}</p>

                    <p class="mt-7 font-display text-5xl font-semibold tracking-tight text-ink tabular-nums">
                        <span class="price-monthly">{{ $tier->monthly }}</span><span class="price-yearly">{{ $tier->yearly }}</span>
                    </p>
                    <p class="mt-2 text-sm text-faint">{{ $tier->unit }}</p>

                    <ul role="list" class="mt-7 flex flex-col gap-3 border-t border-line pt-7 text-[0.9375rem]">
                        @foreach ($planFeatures as $feature)
                        @if ($feature->plan == $tier->slug)
                        <li class="flex items-start gap-2.5 text-lede">
                            <svg viewBox="0 0 16 16" class="h-lh w-4 shrink-0 fill-accent" aria-hidden="true">
                                <path fill-rule="evenodd" d="M13.857 3.19a.75.75 0 0 1 .174 1.047l-6.5 9a.75.75 0 0 1-1.137.089l-3.5-3.5a.75.75 0 1 1 1.06-1.06l2.88 2.878 5.976-8.28a.75.75 0 0 1 1.047-.174Z" clip-rule="evenodd"/>
                            </svg>
                            {{ $feature->text }}
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>

                <div class="mt-9">
                    @if ($tier->popular)
                    <a href="{{ $tier->ctaLink }}" class="btn-primary w-full">{{ $tier->ctaText }}</a>
                    @else
                    <a href="{{ $tier->ctaLink }}" class="btn-quiet w-full">{{ $tier->ctaText }}</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
