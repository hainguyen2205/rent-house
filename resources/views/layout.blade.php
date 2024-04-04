<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="/templates/front/css/style.css" rel="stylesheet">
    <link href="/templates/front/css/flickity.css" rel="stylesheet">
    <script src="/templates/front/js/main.js" defer></script>
</head>

<body>
    @include('header')
    @yield('content')
    @include('footer')
</body>
<script src="/templates/front/js/flickity.js"></script>
</html>
