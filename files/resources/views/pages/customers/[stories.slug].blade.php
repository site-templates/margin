{{-- Dynamic page: one URL per entry of resources/data/collections/stories.json, matched on `slug` — $stories is the entry. Add an entry there to publish; its `content` HTML is the body, and $entries is the whole collection for the "more" list. --}}
<x-layouts.article
    :title="$stories->title"
    :description="$stories->description"
    :kicker="$stories->company"
    kickerLink="/customers"
    dateLabel="Industry"
    :dateFormatted="$stories->industry"
    lengthLabel="Size"
    :readTime="$stories->size"
    authorLabel="Quoted"
    :author="$stories->quoteName"
    :authorRole="$stories->quoteRole"
    :authorAvatar="$stories->quoteAvatar"
    :note="$stories->note"
    :currentLink="$stories->link"
    backText="All customers"
    backLink="/customers"
    moreHeading="More customers"
    :more="$entries"
    current="/customers">

    {!! $stories->content !!}

</x-layouts.article>
