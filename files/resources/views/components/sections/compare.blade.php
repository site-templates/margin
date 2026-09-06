@props([
    'heading' => 'Every difference, in one table.',
    'columnOne' => 'Free',
    'columnTwo' => 'Team',
    'columnThree' => 'Business',
    'items',
])
<!--
    The comparison. On the background rather than in a card, horizontal
    rules only, and it scrolls sideways inside its own gutter on a phone so
    the page never does.
-->
<section id="compare" class="pb-16 sm:pb-20">
    <div class="mx-auto max-w-7xl px-5 sm:px-8">
        <h2 class="display-section max-w-[20ch] font-display font-semibold text-balance text-ink" data-reveal>{{ $heading }}</h2>

        <div class="-mx-5 -my-2 mt-10 overflow-x-auto whitespace-nowrap sm:-mx-8" data-reveal>
            <div class="inline-block min-w-full px-5 py-2 align-middle sm:px-8">
                <table class="w-full text-[0.9375rem]">
                    <thead>
                        <tr class="border-b border-line-strong">
                            <th scope="col" class="py-3 pr-6 text-left font-medium whitespace-nowrap text-ink">Feature</th>
                            <th scope="col" class="px-6 py-3 text-left font-medium whitespace-nowrap text-ink">{{ $columnOne }}</th>
                            <th scope="col" class="px-6 py-3 text-left font-medium whitespace-nowrap text-ink">{{ $columnTwo }}</th>
                            <th scope="col" class="py-3 pl-6 text-left font-medium whitespace-nowrap text-ink">{{ $columnThree }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr class="border-b border-line">
                            <th scope="row" class="py-3.5 pr-6 text-left font-normal whitespace-nowrap text-ink">{{ $item->feature }}</th>
                            <td class="px-6 py-3.5 text-muted">{{ $item->free }}</td>
                            <td class="px-6 py-3.5 text-muted">{{ $item->team }}</td>
                            <td class="py-3.5 pl-6 text-muted">{{ $item->business }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
