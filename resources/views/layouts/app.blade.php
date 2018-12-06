<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>4Geeks Bootcamps</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <!-- Font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link href="{{env('SITE_URL')}}/css/app.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        @if(!(empty($menu)))
            @include('layouts.header', array('menu' => $menu))
        @else
            @include('layouts.header')
        @endif

            @yield('content')
    
        @if(!(empty($menuFooter)))
            @include('layouts.footer', array('menuFooter' => $menuFooter))
        @else
            @include('layouts.footer')
        @endif
        
    </body>
</html>
