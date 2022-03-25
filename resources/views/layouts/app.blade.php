<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="title" content="Pomme - Découverte">
        <meta name="description" content="Découvrez les musiques de Pomme, une artiste folk à la plume délicate">
        <meta name="keywords" content="musique,Pomme,chanson,chanson française">
        <meta name="robots" content="noindex, nofollow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="French">
        <meta name="author" content="Johan Deleon">

        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ env('APP_URL') }}">
        <meta property="og:title" content="Pomme">
        <meta property="og:description" content="Découvrez les musiques de Pomme, une artiste folk à la plume délicate">
        <meta property="og:image" content="{{ asset('/public/images/albums/cover-1.jpg') }}">


        <title>Pomme - Découverte</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href='https://fonts.googleapis.com/css?family=Pangolin' rel='stylesheet'>
        
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Indie+Flower" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Philosopher">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fredericka+the+Great&display=swap" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireStyles
    </head>
    <body>
        @include('layouts.header')
        <main>
            @yield("content")
        </main>
        @livewireScripts
    </body>
</html>
