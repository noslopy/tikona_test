<?php
use \Torann\GeoIP\Facades\GeoIP;

$ip = GeoIP::getClientIP();
$location = GeoIP::getLocation($ip)->country

?>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="flex bg-indigo-100 h-screen items-center text-center text-3xl text-gray-500">
            <div class="block m-auto">
                <p>Here is a message showing that this site can be loaded</p>
                <p>Your IP addres is: <span class="text-black">{{$ip}}</span></p>
                <p>Your location based on IP: <span class="text-black">{{$location}}</span></p>
            </div>
            
        </div>        
    </body>
</html>
