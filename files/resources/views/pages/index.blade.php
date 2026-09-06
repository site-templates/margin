<!--
    The homepage. It lives at pages/index.blade.php, so it is served at "/".
    The page is a list of sections: each tag pulls a component from
    resources/views/components/sections/ and fills its props with these
    attributes. In the visual editor you can select, reorder and edit them
    on the canvas.

    The shapes alternate on purpose — a centred hero over the drawn window,
    the logo wall, the painted panels, a full-bleed band split two ways, the
    margin rail running down the page, three tall quote cards, the figures
    on a hairline, and the close — so the page has a rhythm rather than
    eight variations of the same row. Only the hero and the close are
    centred; everything between them is left-aligned.
-->
<x-layouts.main
    title="Where a note becomes the work"
    description="Margin is the workspace where the notes and the work live on the same page. Write the doc, leave a note, let an agent pick it up."
    current="/">

    <x-sections.hero :marks="$marks" />

    <x-sections.logos :items="$logos" />

    <x-sections.showcase :items="$showcase" />

    <x-sections.agents :steps="$steps" />

    <x-sections.does :items="$does" />

    <x-sections.voices :items="$voices" />

    <x-sections.numbers :items="$numbers" />

    <x-sections.cta />

</x-layouts.main>
