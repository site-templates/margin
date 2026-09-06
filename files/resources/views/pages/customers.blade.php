<!--
    The customers page. Stories come from
    resources/data/collections/stories.json — add an entry there and it
    appears here and at /customers/{slug}.
-->
<x-layouts.main
    title="Customers"
    description="How Orbital, Looply and Axiom use Margin — with the numbers they measured rather than the ones we would like."
    current="/customers">

    <x-sections.page-header
        heading="What changed, and by how much."
        body="Three companies that let us publish their arithmetic. Every figure below is theirs, measured over at least a quarter." />

    <x-sections.stories :items="$stories" />

    <x-sections.numbers :items="$numbers" />

    <x-sections.cta
        heading="See what it does to your Monday."
        body="Start free, point one agent at the meeting nobody enjoys, and measure it yourself." />

</x-layouts.main>
