<!DOCTYPE html>
<html class="flex h-full w-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Gwenaëlle Batta">
    <meta name="description" content="Site de mon API pour mon application Minkee, qui vous assiste das la création de vos vêtements ">
    <meta name="keywords" content="application, Minky, Minkee, API, couture, tissus, plan, fabrication, diy, fil à coudre, coudre, fait main, gradation, glossaire">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="https://minkee.test.lws-servers.be/bg/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://minkee.test.lws-servers.be/bg/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://minkee.test.lws-servers.be/bg/favicon-16x16.png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Minkee — Au fil de vos idées</title>

    <!-- Primary Meta Tags -->
    <meta name="title" content="Minkee — Au fil de vos idées">
    <meta name="description" content="Site de mon API pour mon application Minkee, qui vous assiste das la création de vos vêtements">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://minkee.test.lws-servers.be">
    <meta property="og:title" content="Minkee — Au fil de vos idées">
    <meta property="og:description" content="Site de mon API pour mon application Minkee, qui vous assiste das la création de vos vêtements">
    <meta property="og:image" content="https://minkee.test.lws-servers.be/bg/og-bg.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://minkee.test.lws-servers.be">
    <meta property="twitter:title" content="Minkee — Au fil de vos idées">
    <meta property="twitter:description" content="Site de mon API pour mon application Minkee, qui vous assiste das la création de vos vêtements">
    <meta property="twitter:image" content="https://minkee.test.lws-servers.be/bg/og-bg.png">
</head>
<body class="font-raleway flex-1 flex flex-grow flex-col justify-center align-center h-full w-full justify-center gap-16  ">
<h1 class="flex flex-col justify-center align-center text-center font-bodoni h-full w-full">
    <span class="text-orange-default text-[10rem] font-bold">MK</span>
    <span class="text-6xl">Minkee, au fil de vos idées</span>
</h1>
    <img class="absolute top-0 left-0 right-0 bottom-0 -z-50 opacity-20 h-full object-cover lg:w-full" src="/bg/pexels-ksenia-chernaya-3965543.jpg" alt="image de fond">
</body>
</html>
