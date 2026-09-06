<!--
    The changelog. Entries come from
    resources/data/collections/changelog.json, newest first.
-->
<x-layouts.main
    title="Changelog"
    description="Everything that shipped in Margin, newest first — written by an agent from the pull requests that actually merged, and edited by a person."
    current="/changelog">

    <x-sections.page-header
        heading="Everything that shipped."
        body="Drafted by our own release agent from the pull requests that merged, then edited by whoever is on release duty. It is the feature working on itself." />

    <x-sections.changelog :items="$changelog" />

    <x-sections.cta
        heading="Have the changelog write itself."
        body="Point an agent at your merged pull requests and read the draft over coffee." />

</x-layouts.main>
