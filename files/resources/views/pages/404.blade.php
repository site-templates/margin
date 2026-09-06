<!--
    The 404 page. Served whenever a URL does not match a page — including a
    /blog/{slug} or /customers/{slug} that is not in its collection.
-->
<x-layouts.main title="Page not found" description="That page does not exist." current="">

    <section class="flex min-h-[70vh] items-center py-20">
        <div class="mx-auto w-full max-w-7xl px-5 sm:px-8">
            <div class="grid gap-8 lg:grid-cols-[13rem_minmax(0,44rem)] lg:gap-14">
                <div data-note="amber" class="lg:border-r lg:border-line-strong lg:pr-8 lg:text-right">
                    <span class="inline-flex items-center gap-2 rounded-full bg-(--note)/20 px-3 py-1 text-sm font-medium text-ink tabular-nums">
                        <span class="size-1.5 shrink-0 rounded-full bg-(--note)" aria-hidden="true"></span>
                        404
                    </span>
                </div>
                <div>
                    <h1 class="display-page max-w-[18ch] font-display font-semibold text-balance text-ink">Nothing was ever written here.</h1>
                    <p class="mt-6 max-w-[52ch] text-lg/7 text-pretty text-lede">The link is broken or the page has moved. Everything else is one click away.</p>
                    <div class="mt-9 flex flex-wrap items-center gap-3">
                        <a href="/" class="btn-primary btn-lg">Back to the homepage</a>
                        <a href="/product" class="btn-ghost btn-lg">See the product</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layouts.main>
