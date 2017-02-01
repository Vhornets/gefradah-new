<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link href="http://fonts.googleapis.com/css?family=Fira+Sans:300,400,500,700,300italic,400italic,500italic,700italic" rel="stylesheet" type="text/css">
    <link href="/css/app.min.css" rel="stylesheet">

    <!-- Facebook Opengraph -->
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="Shelter"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="{{config('APP_URL')}}"/>
    <meta property="og:site_name" content="{{ config('app.name') }}"/>
    <meta property="og:image" content="/img/og_default_image.jpg"/>

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@victorhornets">
    <meta name="twitter:creator" content="@victorhornets">
    <meta name="twitter:title" content="{{ config('app.name') }}">
    <meta name="twitter:description" content="Shelter">
    <meta name="twitter:image" content="/img/og_default_image.jpg">    
</head>

<body>
    <div id="app" class="c-app"></div>

    <script src="/js/bundle.js"></script>

    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-66411847-1', 'auto');
    ga('send', 'pageview');
    </script>    
</body>
</html>