<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="og:image" content="@yield('opengraph-image', url('/logo-large.png'))">

    <title>@yield('page-title')</title>

    <link rel="icon" type="image/ico" href="/favicon.png">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/app.css">	
    <script src="/js/app.js"></script>

    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131646227-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-131646227-1');
    </script>


</head>
<body>
    @include('partials.nav')

    @yield('content')

    @yield('scripts')
</body>
</html>