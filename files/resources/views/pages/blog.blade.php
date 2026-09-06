<!--
    The blog index. Posts come from resources/data/collections/posts.json —
    add an entry there and it appears here and at /blog/{slug}.
-->
<x-layouts.main
    title="Blog"
    description="How we think about notes, agents, pricing and writing things down — from the people building Margin."
    current="/blog">

    <x-sections.page-header
        heading="Notes on writing things down."
        body="What we have learnt building a workspace where the thinking and the doing sit on the same page." />

    <x-sections.posts :items="$posts" />

    <x-sections.cta
        heading="Stop retyping the thought."
        body="Free for up to ten people, and your first agent runs on day one." />

</x-layouts.main>
