<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    @include('header')
    @yield('content')
    @include('footer')
   
</body>

</html>
