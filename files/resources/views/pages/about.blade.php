<!--
    The about page. It reuses the margin rail three times over — the dates
    beside the story, the values on the rule — because that device is the
    product, and a company page that looks like the product is the point.
-->
<x-layouts.main
    title="About"
    description="Margin is twenty-nine people trying to make writing things down worth the eleven minutes it used to cost."
    current="/about">

    <x-sections.page-header
        heading="We are trying to make writing things down worth it."
        body="Every company already knows it should write more down. Almost none of them do, and the reason is not discipline — it is that a written thought has nowhere to go." />

    <x-sections.story
        heading="How we got here."
        bodyOne="Margin started as a stopwatch. In 2023 we sat with people at three companies and timed the gap between noticing something wrong in a document and filing something a colleague could act on. The median was eleven minutes, and nine times out of ten they gave up before the eleven minutes were done."
        bodyTwo="Everything since has been an attempt to get that number to zero. The note came first, then the board it lands on, then the agents that pick it up, then a price that does not punish you for inviting the person who needed to read it. We are not finished, and the stopwatch is still running."
        :items="$milestones" />

    <x-sections.does
        heading="Four things we argue about."
        body="Written down, on a page, with notes in the margin where people disagreed."
        :items="$values" />

    <x-sections.team :items="$team" />

    <x-sections.cta
        heading="Come and write things down with us."
        body="Or just use the thing. Both are a reasonable way to start." />

</x-layouts.main>
