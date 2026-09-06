# Margin — design system

## Atmosphere
A warm paper notebook under afternoon light. The page is an off-white canvas
that reads as tactile rather than clinical, white cards sit on it like ruled
sections in a Moleskine, and colour is used as punctuation: one blue anchors
every action, a peach swipe highlights one word of the headline, and four note
hues paint whole panels the way a sticky note paints a page. Type is Inter with
aggressive negative tracking at display sizes, so a big warm headline reads
confident rather than airy. Depth comes from hairlines, never shadows — the
site casts exactly two, on the sticky header and the hero's window. Every
product interface is drawn in markup, never screenshotted, so it stays sharp.

## Colors
| Token | Value | Role |
|---|---|---|
| canvas | `#f6f5f4` | the page ground — the warm off-white is the whole signature |
| surface | `#ffffff` | cards, the drawn window, the closing panel |
| well | `#efedea` | recessed panels, the agents band, drawing backdrops, inline code |
| ink | `#141310` | headings and primary text (17.0:1) |
| lede | `#4a423a` | the one paragraph under a heading, prose body (9.0:1) |
| muted | `#6b625a` | card body, descriptions (5.5:1) |
| faint | `#756b62` | meta, timestamps, captions (4.8:1) |
| line / line-strong | ink at 9% / 16% | hairlines; line-strong draws the margin rule itself |
| accent | `#0075de` | the one filled button, checks, the caret (4.6:1 with white) |
| accent-lift | `#0064c0` | button hover |
| accent-text | `#005cb0` | accent-coloured **text** on canvas, where the fill would only reach 4.3:1 |
| accent-wash | `#e6f3fe` | the ghost button, agent status chips, citations |
| accent-soft | `#a9d4f8` | underlines, quiet rings |
| note-amber | `#ffb110` | a note hue — takes ink |
| note-coral | `#f9563d` | a note hue — takes ink |
| note-sky | `#7cbcf5` | a note hue — takes ink |
| note-midnight | `#0d1330` | a note hue — takes white |
| highlight | `#fbdcb9` | the marker swipe behind one word of the hero, and text selection |

Rules that hold everywhere: **the canvas is never white and a card is never
warm** — inverting that hierarchy loses the system. **One filled blue button
per view**; every other action is the pale-blue ghost, the white quiet pill or
a plain text link. **Note hues paint panels only** — never a border, never
type. A panel sets `data-note` once and its markup reads `bg-(--note)` and
`text-(--note-ink)`, so recolouring is one word in a collection.

## Typography
- **Inter** for everything — display and body, weights 400/500/600, with
  `cv02 cv03 cv04 cv11 ss03`. Never `font-bold`; 600 is the ceiling.
- **Source Serif 4** for quotes only: testimonial cards, a post's standfirst,
  the footer line, prose blockquotes. Never for UI, never for a heading.
- Hero `clamp(2.75rem, 6vw, 4.5rem)` / 1.06 / **-0.04em** — the tracking is
  what makes it feel drawn rather than set.
- Page `clamp(2.5rem, 5vw, 3.75rem)` / 1.06 / -0.035em.
- Section `clamp(2rem, 3.6vw, 3rem)` / 1.08 / -0.035em. Card title 1.375rem/1.25.
- Lede `1.125rem/1.75`. Body `1rem/1.65`. Small `0.875rem`. Prose `1.0625rem/1.8`.
- Headings `text-balance`, paragraphs `text-pretty`, measure capped in `ch` on
  the element itself — never on a wrapper. **No eyebrows above headings.**

## Spacing & radius
Sections `py-20 sm:py-28`; a page's first section opens `pt-16 sm:pt-24`. One
container everywhere: `max-w-7xl` with `px-5 sm:px-8`. One column gap
everywhere: `gap-5`. Radius is two values and two only — rectangles are
`rounded-xl` (12px), buttons `rounded-lg` (8px), and pills are full. Nothing
rectangular is ever rounder than 12px.

## Components
- **The margin rail** — the signature. A hairline vertical rule with chips hung
  off it on short connectors. It is the "what Margin does" list, the reading
  spine of a post, the date gutter of the changelog, the dates beside the
  founding story, and it is drawn inside the hero's window. Anything that would
  normally be crammed under a title belongs out in the margin instead.
- **The marker swipe** — one word of the hero inside a peach pill with
  `box-decoration-break: clone`, so it survives a line break.
- **Painted panels** — a note hue filling a whole card or a full-bleed row,
  with a drawn mock inside. Never bordered, never shadowed.
- **Drawn mocks** — six of them in `mocks/panel`, plus the full workspace
  window. All markup: no screenshots anywhere on this site.
- **Buttons** — `.btn-primary` (blue fill), `.btn-ghost` (pale blue wash),
  `.btn-quiet` (white pill in a hairline), with `.btn-sm` / `.btn-lg`.

## Motion
One authored moment: a chip attaches to the rail — its connector draws out from
the rule and the chip settles the last half-rem. Everything else is a plain
fade-and-rise reveal. All of it is gated behind `html.js`, so nothing is ever
hidden without JavaScript, and `prefers-reduced-motion` resolves every element
to its visible resting state. Hovers change colour instantly; only things that
travel get a transition.

## Voice
Plain, specific, quietly confident. Short sentences that name the thing that
happens — "An agent picks it up." Numbers are real and attributed. Headings
take a full stop; list items do not. Never "powerful", "seamless",
"all-in-one", "supercharge", "unlock". No emoji, anywhere.

## Anti-patterns
- A white page. The warm canvas is the system.
- A shadow on a card. Hairlines only; the header and the hero window are the
  two exceptions on the whole site.
- A second filled blue button in one view.
- A note hue used as a border, an icon colour or a text colour.
- An eyebrow above a heading, or a centred heading group anywhere but the hero
  and the closing panel.
- A screenshot standing in for a drawn mock.
- A raw hex, `bg-zinc-*` or `text-white` in section markup.

## Tokens
```css
@theme {
    --color-canvas: #f6f5f4;
    --color-surface: #ffffff;
    --color-well: #efedea;

    --color-ink: #141310;
    --color-lede: #4a423a;
    --color-muted: #6b625a;
    --color-faint: #756b62;

    --color-line: rgb(20 19 16 / 0.09);
    --color-line-strong: rgb(20 19 16 / 0.16);

    --color-accent: #0075de;
    --color-accent-lift: #0064c0;
    --color-accent-ink: #ffffff;
    --color-accent-text: #005cb0;
    --color-accent-wash: #e6f3fe;
    --color-accent-soft: #a9d4f8;

    --color-note-amber: #ffb110;
    --color-note-coral: #f9563d;
    --color-note-sky: #7cbcf5;
    --color-note-midnight: #0d1330;
    --color-note-ink: #141310;

    --color-highlight: #fbdcb9;

    --font-sans: "Inter", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    --font-display: "Inter", ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    --font-serif: "Source Serif 4", ui-serif, Georgia, Cambria, serif;

    --shadow-header: 0 0.7px 1.5px rgb(20 19 16 / 0.02), 0 3px 9px rgb(20 19 16 / 0.04);
    --shadow-window: 0 1px 2px rgb(20 19 16 / 0.04), 0 12px 32px rgb(20 19 16 / 0.08);

    --ease-glide: cubic-bezier(0.22, 1, 0.36, 1);
}
```
