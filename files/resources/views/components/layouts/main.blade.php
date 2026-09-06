@props(['title' => 'Home', 'description' => '', 'current' => '/'])
<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }} · {{ $site->name }}</title>
    <meta name="description" content="{{ $description }}">

    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <!-- Inter sets every heading, label and paragraph; Source Serif 4 is for quotes alone. -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&family=Source+Serif+4:opsz,wght@8..60,400..600&display=swap" rel="stylesheet">

    <!-- Loads Tailwind, then the tokens, the type scale, the rail, the prose rules and the motion system -->
    @vite(['resources/css/site.css'])

    <!-- Flags JavaScript before first paint so scroll reveals never flash -->
    <script>document.documentElement.classList.add('js')</script>
    <script src="/js/main.js" defer></script>
</head>
<body data-instant-navigation class="min-h-dvh bg-canvas font-sans text-ink antialiased">
<!--
    A warm paper canvas, white cards on top of it, one blue for every action,
    and four note hues that paint whole panels. The header sits at the top of
    every page and grows a hairline once you scroll; the footer closes every
    page the same way.
-->

    <x-nav :links="$site->nav_links" :product="$site->product_links" :current="$current" />

    <main class="isolate">
        {{ $slot }}
    </main>

    <x-footer :columns="$site->footer_columns" :legalLinks="$site->footer_legal" />

</body>
</html>
