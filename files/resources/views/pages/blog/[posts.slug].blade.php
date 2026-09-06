{{-- Dynamic page: one URL per entry of resources/data/collections/posts.json, matched on `slug` — $posts is the entry. Add an entry there to publish; its `content` HTML is the body, and $entries is the whole collection for the "more" list. --}}
<x-layouts.article
    :title="$posts->title"
    :description="$posts->description"
    :kicker="$posts->category"
    kickerLink="/blog"
    :dateFormatted="$posts->dateFormatted"
    :readTime="$posts->readTime"
    :author="$posts->author"
    :authorRole="$posts->authorRole"
    :authorAvatar="$posts->authorAvatar"
    :note="$posts->note"
    :currentLink="$posts->link"
    backText="All posts"
    backLink="/blog"
    moreHeading="More from the blog"
    :more="$entries"
    current="/blog">

    {!! $posts->content !!}

</x-layouts.article>
