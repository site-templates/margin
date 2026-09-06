<!--
    The pricing page. The three plans, then the whole difference in one
    table, then the questions people ask before they put a card in.
-->
<x-layouts.main
    title="Pricing"
    description="Free for up to ten people. Team is $12 a person a month, Business is $22. Agent runs, not seats, are what you outgrow."
    current="/pricing">

    <x-sections.page-header
        heading="Free until the habit sticks."
        body="You are not billed for people who read. You are billed for the work Margin does, which is the only number that goes up when it is going well." />

    <x-sections.pricing :tiers="$tiers" :planFeatures="$planFeatures" />

    <x-sections.compare :items="$compare" />

    <x-sections.faq :items="$faq" />

    <x-sections.cta
        heading="Start on Free. Nobody will chase you."
        body="Ten people, unlimited pages, fifty agent runs a month, and no card until you want the eleventh person." />

</x-layouts.main>
