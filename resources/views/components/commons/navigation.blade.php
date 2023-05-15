@props([
   'page'
])
@php
    $urlAction = "/"
@endphp
<!doctype html>
<html lang="{{app()->getLocale()}}" class="relative">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
          content="Site de l'option web infographie de la HEPL (Haute École de la province de Liège) ">
    <meta name="keywords"
          content="web, HEPL, infographie, HTML, CSS, Javascript, PHP, Tailwind, Multimédia, design web, front-end, back-end, développement web">
    <meta name="author" content="Gwenaëlle Batta">
    <link rel="apple-touch-icon" sizes="180x180" href="{{config('app.url')}}/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{config('app.url')}}/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{config('app.url')}}/img/favicon-16x16.png">
    <link rel="manifest" href="{{config('app.url')}}/img/site.webmanifest">
    <link rel="mask-icon" href="{{config('app.url')}}/img/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Primary Meta Tags -->
    <title>{{__('Minkee – '. htmlspecialchars_decode ($page , $flags= ENT_QUOTES))}}</title>
    <meta name="title" content="{{__('Minkee – '. htmlspecialchars_decode ($page , $flags= ENT_QUOTES))}}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{config('app.url')}}">
    <meta property="og:title" content="{{__('Minkee – '. htmlspecialchars_decode ($page , $flags= ENT_QUOTES))}}">
    <meta property="og:description" content="Site de l'application Minkee, une application qui vous assiste dans la création de vos vêtements.">
    <meta property="og:image" content="">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{config('app.url')}}">
    <meta property="twitter:title" content="{{__('Minkee – '. htmlspecialchars_decode ($page , $flags= ENT_QUOTES))}}">
    <meta property="twitter:description" content="Site de l'application Minkee, une application qui vous assiste dans la création de vos vêtements.">
    <meta property="twitter:image" content="">
    @vite('resources/css/app.css')
    @vite('resources/js/app.ts')
</head>
<body class="no-js bg-white-100 selection:bg-green-200 selection:text-white-100" aria-labelledby="body">
<header>
    <h1 class="sr-only" aria-level="1" role="heading"
        id="body">Minkee</h1>
    <a href="/{{app()->getLocale()}}/#content" class="sr-only">{{__('nav.nav_avoid content')}}</a>
    <nav class="flex flex-col" aria-labelledby="navigation">
        <h2 class="sr-only" id="navigation" role="heading" aria-level="2">{{__('nav.nav_title')}}</h2>
        <div class="bg-green-700 text-white-100 font-sans flex gap-x-10 justify-between lg:px-16 xl:px-32 2xl:px-48 px-2.5 py-2 xl:py-4 font-semibold text-lg xl:text-xl 2xl:text-2xl">
            @guest()
                <a class="-order-2 hover:text-orange-500" dusk="@login-link"
                   href="/{{app()->getLocale()}}/user/login">{{__('nav.connexion')}}</a>
            @endguest
            @auth()
                <div class="-order-2 min-w-[15%] gap-3 relative user_name">
                    @if(session('success'))
                        <a href="#" class="relative z-50">{{session('success')}}</a>
                    @else
                        <a href="#" class="relative z-50">{{auth()->user()->firstname}} {{auth()->user()->name}}</a>
                    @endif
                    <div class="bg-green-700 hover_section absolute z-40 flex-1 rounded-lg flex gap-2 pt-14 p-3 flex-col">
                        <a dusk="logged-user-name"
                           class="border-b-2 border-b-white-100/40 pb-2 flex-1 hover:text-orange-500"
                           href="/{{app()->getLocale()}}/user/profile">{{__('user.user_my_profile')}}</a>
                        <a dusk="logged-user-name"
                           class="border-b-2 border-b-white-100/40 pb-2 flex-1 hover:text-orange-500"
                           href="/{{app()->getLocale()}}/user/profile/modify/form">{{__('user.user_modify')}}</a>
                        <form action="/logout"
                              method="post">
                            @csrf
                            <button class="hover:text-orange-500" type="submit">{{__('nav.logout')}}</button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
        <div class="relative z-30 flex flex-1 items-center justify-between order-2 bg-yellow-100 py-8 lg:px-16 xl:px-32 2xl:px-48 px-5 lg:gap-x-7 xl:pt-8 xl:pb-8">
            <div class="group ml-4 group relative">
                <svg class="xl:not-sr-only sr-only" xmlns="http://www.w3.org/2000/svg" width="170.001" height="77.656"
                     viewBox="0 0 170.001 77.656">
                    <g  data-name="Groupe 284" transform="translate(-230.999 -70.345)">
                        <path data-name="Soustraction 1"
                              d="M4116.213,11516.657h-48.141a12.468,12.468,0,0,1-4.4-.723,3.3,3.3,0,0,1-2.414-3.093,2.349,2.349,0,0,1,.648-1.733c.956-.958,2.789-1.09,4.628-1.09.287,0,.581,0,.818.006l.208,0,.513,0h20.255v-6.63h-29.886a14.443,14.443,0,0,1-14.443-14.443v-35.513a14.443,14.443,0,0,1,14.443-14.442h67.4a14.33,14.33,0,0,1,8.646,2.871,14.562,14.562,0,0,1,5.151,7.285h-6.012a9.381,9.381,0,0,0-7.784-4.529h-67.4a9.642,9.642,0,0,0-5.324,1.756,7.99,7.99,0,0,0-2.4,2.7,9.666,9.666,0,0,0-1.092,4.361v35.513a8.727,8.727,0,0,0,2.232,6.449,9.375,9.375,0,0,0,6.58,2.366h67.4a10.458,10.458,0,0,0,3.925-.761,7.37,7.37,0,0,0,3.823-3.493h5.96a14.449,14.449,0,0,1-13.708,9.882h-29.885v6.63h20.255a17.816,17.816,0,0,1,4.405.409c1.6.432,2.41,1.24,2.41,2.4,0,1.5-1.311,2.407-2.411,2.905A11.38,11.38,0,0,1,4116.213,11516.657Z"
                              transform="translate(-3813 -11368.656)" fill="rgba(111, 112, 77, 0.3)"/>
                        <g data-name="Groupe 251" transform="translate(0 63)">
                            <text class="group-hover:fill-green-700" data-name="TecWeb "
                                  transform="translate(242 47)" fill="#da953a" font-size="35"
                                  font-family="Montserrat-Bold, Montserrat" font-weight="700">
                                <tspan x="0" y="0">TecWeb</tspan>
                            </text>
                            <text class="group-hover:fill-green-700"
                                  data-name="Le site de l’option web de la HEPL" transform="translate(242 58)"
                                  fill="#da953a" font-size="11" font-family="Hind-Regular, Hind">
                                <tspan x="0" y="0">Le site de l’option web de la HEPL</tspan>
                            </text>
                        </g>
                    </g>
                </svg>
                <svg class="lg:not-sr-only sr-only xl:sr-only" xmlns="http://www.w3.org/2000/svg" width="140.001"
                     height="77.656"
                     viewBox="0 0 170.001 77.656">
                    <g  data-name="Groupe 284" transform="translate(-230.999 -70.345)">
                        <path data-name="Soustraction 1"
                              d="M4116.213,11516.657h-48.141a12.468,12.468,0,0,1-4.4-.723,3.3,3.3,0,0,1-2.414-3.093,2.349,2.349,0,0,1,.648-1.733c.956-.958,2.789-1.09,4.628-1.09.287,0,.581,0,.818.006l.208,0,.513,0h20.255v-6.63h-29.886a14.443,14.443,0,0,1-14.443-14.443v-35.513a14.443,14.443,0,0,1,14.443-14.442h67.4a14.33,14.33,0,0,1,8.646,2.871,14.562,14.562,0,0,1,5.151,7.285h-6.012a9.381,9.381,0,0,0-7.784-4.529h-67.4a9.642,9.642,0,0,0-5.324,1.756,7.99,7.99,0,0,0-2.4,2.7,9.666,9.666,0,0,0-1.092,4.361v35.513a8.727,8.727,0,0,0,2.232,6.449,9.375,9.375,0,0,0,6.58,2.366h67.4a10.458,10.458,0,0,0,3.925-.761,7.37,7.37,0,0,0,3.823-3.493h5.96a14.449,14.449,0,0,1-13.708,9.882h-29.885v6.63h20.255a17.816,17.816,0,0,1,4.405.409c1.6.432,2.41,1.24,2.41,2.4,0,1.5-1.311,2.407-2.411,2.905A11.38,11.38,0,0,1,4116.213,11516.657Z"
                              transform="translate(-3813 -11368.656)" fill="rgba(111, 112, 77, 0.3)"/>
                        <g data-name="Groupe 251" transform="translate(0 63)">
                            <text class="group-hover:fill-green-700" data-name="TecWeb "
                                  transform="translate(242 47)" fill="#da953a" font-size="35"
                                  font-family="Montserrat-Bold, Montserrat" font-weight="700">
                                <tspan x="0" y="0">TecWeb</tspan>
                            </text>
                            <text class="group-hover:fill-green-700"
                                  data-name="Le site de l’option web de la HEPL" transform="translate(242 58)"
                                  fill="#da953a" font-size="11" font-family="Hind-Regular, Hind">
                                <tspan x="0" y="0">Le site de l’option web de la HEPL</tspan>
                            </text>
                        </g>
                    </g>
                </svg>
                <svg class="lg:sr-only" xmlns="http://www.w3.org/2000/svg" width="80" viewBox="0 0 170.001 77.656">
                    <g  data-name="Groupe 284" transform="translate(-230.999 -70.345)">
                        <path data-name="Soustraction 1"
                              d="M4116.213,11516.657h-48.141a12.468,12.468,0,0,1-4.4-.723,3.3,3.3,0,0,1-2.414-3.093,2.349,2.349,0,0,1,.648-1.733c.956-.958,2.789-1.09,4.628-1.09.287,0,.581,0,.818.006l.208,0,.513,0h20.255v-6.63h-29.886a14.443,14.443,0,0,1-14.443-14.443v-35.513a14.443,14.443,0,0,1,14.443-14.442h67.4a14.33,14.33,0,0,1,8.646,2.871,14.562,14.562,0,0,1,5.151,7.285h-6.012a9.381,9.381,0,0,0-7.784-4.529h-67.4a9.642,9.642,0,0,0-5.324,1.756,7.99,7.99,0,0,0-2.4,2.7,9.666,9.666,0,0,0-1.092,4.361v35.513a8.727,8.727,0,0,0,2.232,6.449,9.375,9.375,0,0,0,6.58,2.366h67.4a10.458,10.458,0,0,0,3.925-.761,7.37,7.37,0,0,0,3.823-3.493h5.96a14.449,14.449,0,0,1-13.708,9.882h-29.885v6.63h20.255a17.816,17.816,0,0,1,4.405.409c1.6.432,2.41,1.24,2.41,2.4,0,1.5-1.311,2.407-2.411,2.905A11.38,11.38,0,0,1,4116.213,11516.657Z"
                              transform="translate(-3813 -11368.656)" fill="rgba(111, 112, 77, 0.3)"/>
                        <g data-name="Groupe 251" transform="translate(0 63)">
                            <text class="group-hover:fill-green-700" data-name="TecWeb "
                                  transform="translate(242 47)" fill="#da953a" font-size="35"
                                  font-family="Montserrat-Bold, Montserrat" font-weight="700">
                                <tspan x="0" y="0">TecWeb</tspan>
                            </text>
                            <text class="group-hover:fill-green-700"
                                  data-name="Le site de l’option web de la HEPL" transform="translate(242 58)"
                                  fill="#da953a" font-size="11" font-family="Hind-Regular, Hind">
                                <tspan x="0" y="0">Le site de l’option web de la HEPL</tspan>
                            </text>
                        </g>
                    </g>
                </svg>
                <a href="/{{app()->getLocale()}}" class="linkcard">{{__('nav.nav_link_home')}}</a>
            </div>
            <ul class="sr-only lg:not-sr-only flex xl:justify-start lg:gap-x-3 xl:gap-x-5 text-green-700 lg:text-lg xl:text-xl 2xl:text-2xl lg:justify-start flex-1 font-sans font-semibold">
                <li><a class="hover:text-orange-500"
                       href="/{{app()->getLocale()}}/bottin/alumni"> {{__('nav.nav_navigation.alumni')}}</a></li>
                <li><a class="hover:text-orange-500"
                       href="/{{app()->getLocale()}}/project/index"> {{__('nav.nav_navigation.project')}}</a></li>
                <li><a class="hover:text-orange-500"
                       href="/{{app()->getLocale()}}/forum/index"> {{__('nav.nav_navigation.forum')}}</a></li>
                <li><a class="hover:text-orange-500"
                       href="/{{app()->getLocale()}}/about"> {{__('nav.nav_navigation.about')}}</a></li>
                <li><a class="hover:text-orange-500"
                       href="/{{app()->getLocale()}}/news/index"> {{__('nav.nav_navigation.actualities')}}</a></li>
                <li><a class="hover:text-orange-500"
                       href="/{{app()->getLocale()}}/contact/student"> {{__('nav.nav_navigation.contact')}}</a></li>
            </ul>
            <input class="absolute cursor-pointer opacity-0 z-30 w-8 h-8 " type="checkbox" name="burger" id="burger">
            <div class="relative -order-1">
                <label class="sr-only" for="burger">{{__('nav.nav_burger')}}</label>
                <div class="cursor-pointer space-y-2 absolute -top-2.5 xl:-top-2">
                    <div class="w-8 h-0.5 bg-green-700"></div>
                    <div class="w-8 h-0.5 bg-green-700"></div>
                    <div class="w-8 h-0.5 bg-green-700"></div>
                </div>
            </div>
            <div class="burger_position bg-green-200 min-w-full z-20 ">
                <ul class="xl:max-w-[30%] flex-1 bg-green-700 font-sans text-lg xl:text-xl 2xl:text-2xl text-white-100 font-semibold flex flex-col justify-between py-6 gap-4 xl:gap-6 xl:py-7 2xl:py-10 px-5 h-full">
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2">
                        <a class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/project/index">
                            <span>
                                {{__("nav.nav_navigation.project")}}
                            </span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a>
                    </li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/contact/student">
                            <span>
                                {{__('nav.nav_navigation.contact')}}
                            </span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/about">
                            <span>{{__('nav.nav_navigation.about')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/news/index">
                            <span>{{__('nav.nav_navigation.actualities')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/technical/index">
                            <span>{{__('nav.nav_navigation.technical')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/forum/index">
                            <span>{{__('nav.nav_navigation.forum')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/bottin">
                            <span>{{__('nav.nav_navigation.people')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/bottin/alumni">
                            <span>{{__('nav.nav_navigation.alumni')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li class="border-b-2 border-b-white-100/40 pb-0.5 xl:pb-2"><a
                            class="group flex flex-1 justify-between" href="/{{app()->getLocale()}}/entreprise/partner">
                            <span>{{__('nav.nav_navigation.partner')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a></li>
                    <li>
                        <a class="group flex flex-1 justify-between border-b-2 border-b-white-100/40 pb-0.5 xl:border-b-0 xl:pb-0"
                           href="/{{app()->getLocale()}}/technical/tuto">
                            <span>{{__('nav.nav_navigation.tuto')}}</span>
                            <svg class="group-hover:mr-0 group-hover:opacity-100 opacity-0 mr-3 self-end "
                                 xmlns="http://www.w3.org/2000/svg" width="32"
                                 height="27.417"
                                 viewBox="0 0 32 27.417">
                                <path
                                    d="M51,21.715a1.956,1.956,0,0,1-.56,1.355l-.012.023-11.75,11.75a1.958,1.958,0,1,1-2.769-2.769l8.405-8.409H20.958a1.958,1.958,0,0,1,0-3.917H44.314l-8.405-8.405a1.958,1.958,0,1,1,2.769-2.769l11.75,11.75.012.02A1.968,1.968,0,0,1,51,21.707Z"
                                    transform="translate(-19 -8.001)" fill="#ffffff"/>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
