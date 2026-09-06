<!--
    The product page. Six capability rows, each anchored so the Product menu
    in the header lands on the right one. Two of them are painted full-bleed
    bands and the drawing side alternates, so the page has a rhythm rather
    than six identical left-text right-picture rows.
-->
<x-layouts.main
    title="Product"
    description="Docs, margin notes, agents, search, projects and connections — the six parts of Margin and what each one does."
    current="/product">

    <x-sections.page-header
        heading="One page. The writing, the work, and the argument about both."
        body="Margin is six things that only make sense together. Here is each of them, and the specific job it takes off your plate." />

    <x-sections.feature-row
        anchor="docs"
        heading="Docs people actually finish."
        body="A fast, plain editor that gets out of the way, with every source the page depends on hanging in its margin. Nothing is pasted in and left to rot — the Slack thread, the pull requests and the roadmap item stay linked to the paragraph that cites them."
        linkText="Start a doc"
        link="#"
        mock="sources"
        side="right" />

    <x-sections.feature-row
        anchor="notes"
        heading="The note is the unit of work."
        body="Select any line and leave a note in the margin. It carries the paragraph it sits beside, so whoever picks it up already has the context — and it closes when the work lands, not when someone remembers to tick it."
        linkText="See how notes travel"
        link="#"
        mock="notes"
        side="left"
        note="amber" />

    <x-sections.feature-row
        anchor="agents"
        heading="Agents that read before they write."
        body="An agent reads the note, reads the page and reads the ten pages that page links to. Then it does the work and shows you every step it took, so you are reviewing a draft rather than trusting a black box."
        linkText="Read the agent guide"
        link="#"
        mock="agent"
        side="right" />

    <x-sections.feature-row
        anchor="search"
        heading="Answers with the line they came from."
        body="Ask a question the way you would ask a colleague. Margin answers from your own pages and hands you the exact line it read, so you can tell the difference between a fact and a guess."
        linkText="Try a search"
        link="#"
        mock="search"
        side="left" />

    <x-sections.feature-row
        anchor="projects"
        heading="Every open note on one board."
        body="Notes become cards the moment somebody needs them done, and the card and the note are the same object — move it, assign it, close it, and the paragraph it came from updates with it."
        linkText="See a board"
        link="#"
        mock="board"
        side="right"
        note="sky" />

    <x-sections.feature-row
        anchor="connections"
        heading="Connected to where the work already is."
        body="Slack threads become notes, pull requests close them, Linear issues stay in step and support tickets find the runbook by themselves. Margin does not ask your team to move — it asks them to write things down once."
        linkText="Browse connections"
        link="#"
        mock="connections"
        side="left" />

    <x-sections.does :items="$does" />

    <x-sections.cta
        heading="Try it on the doc you are avoiding."
        body="Open Margin, paste the thing nobody has finished, and leave one note in its margin." />

</x-layouts.main>
