<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $page->title }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#28bd88">
        <meta name="msapplication-TileColor" content="#28bd88">
        <meta name="theme-color" content="#28bd88">

        <meta name="description" content="{!! $page->description !!}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="@cossssmin">
        <meta name="twitter:title" content="{{ $page->title }}">
        <meta name="twitter:description" content="{{ $page->description }}">
        <meta property="twitter:image" content="{{ $page->baseUrl . '/assets/img/ste-card.jpg' }}">
        <meta name="twitter:creator" content="@cossssmin">
        <meta property="og:url" content="{{ $page->baseUrl }}">
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $page->title }}">
        <meta property="og:description" content="{{ $page->description }}">
        <meta property="og:image" content="{{ $page->baseUrl . '/assets/img/ste-card.jpg' }}">

        <link rel="stylesheet" href="{{ mix('/css/main.css') }}">
    </head>
    <body class="antialiased font-sans">
        @yield('content')
        @stack('scripts')
    </body>
</html>
