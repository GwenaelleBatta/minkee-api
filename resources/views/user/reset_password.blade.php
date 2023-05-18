<!doctype html>
<html lang="fr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Gwenaëlle Batta">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Minkee — Réinitialisation</title>
</head>
<body class="font-raleway flex flex-grow flex-col justify-center align-cente h-full justify-center gap-16  ">
<h1 class="flex flex-col justify-center align-center text-center font-bodoni">
    <span class="text-orange-default text-9xl font-bold">MK</span>
    <span class="text-lg">Minkee, au fil de vos idées</span>
</h1>
<main id="content" class="">
    <img class="absolute top-0 left-0 right-0 bottom-0 -z-50 opacity-20 h-full object-cover lg:w-full" src="/bg/pexels-ksenia-chernaya-3965543.jpg" alt="image de fond">
    <section class="px-5 lg:px-16 xl:px-32 2xl:px-48 pb-20 items-center xl:gap-24 flex justify-center align-center flex-1"
             aria-labelledby="reset">
        <div class="lg:px-10">
            <div class="flex flex-col">
                <h2 class="text-2xl 2xl:text-5xl md:text-3xl xl:text-4xl font-bold mb-3 font-bodoni order-1 "
                    role="heading" aria-level="2" id="reset">
                    {{__('Réinitialisation du mot de passe')}}
                </h2>
            </div>
            <div class="flex mt-7">
                <form action="/user/reset" method="post" class="flex flex-col xl:block min-w-full">
                    @csrf
                    <div class="flex flex-col mb-8">
                        <label class="@error('email') text-red-400 @enderror text-lg xl:text-xl 2xl:text-2xl"
                               for="email">{{__('login_register.mail')}}</label>
                        @error('email')
                        <div class="flex gap-1.5 items-center">
                            <svg class="h-7 w-7 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-red-500 text-lg font-semibold mt-2">{{ $message }}</p>
                        </div>
                        @enderror
                        <input
                            class="2xl:text-xl border border-grey-light rounded-xl py-2 px-3 text-gray-700 leading-tight @error('email') outline-red-600 @enderror focus:outline-3 focus:outline-orange-default border focus:bg-white"
                            name="email" dusk="email-field" id="email" type="email" placeholder="email@example.be"
                            value="{{old('email')}}">
                    </div>
                    <div class="flex flex-col mb-8">
                        <label class=" @error('password') text-red-400 @enderror text-lg xl:text-xl 2xl:text-2xl"
                               for="password">
                            {{__('login_register.password')}}
                        </label>
                        @error('password')
                        <div class="flex gap-1.5 items-center ">
                            <svg class="h-7 w-7 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-red-500 text-lg font-semibold mt-2">{{ $message }}</p>
                        </div>
                        @enderror
                        <div class="flex-1 px-3 items-center bg-white  @error('password') outline-red-600 @enderror flex border leading-tight border-grey-light rounded-xl focus-within:border focus-within:border-2 focus-within:border-orange-default focus-within:bg-white">
                            <input
                                class="2xl:text-xl password outline-none font-mono focus:bg-white py-2 text-gray-700 h-full w-full "
                                name="password" dusk="password-field" id="password" type="password"
                                placeholder="azerty">
                                    <span class="show-password cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 22 22" width="20" height="20"
                                             class="fill-orange-default">
                                                <path class="show"
                                                      d="M21.92,11.6C19.9,6.91,16.1,4,12,4S4.1,6.91,2.08,11.6a1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20s7.9-2.91,9.92-7.6A1,1,0,0,0,21.92,11.6ZM12,18c-3.17,0-6.17-2.29-7.9-6C5.83,8.29,8.83,6,12,6s6.17,2.29,7.9,6C18.17,15.71,15.17,18,12,18ZM12,8a4,4,0,1,0,4,4A4,4,0,0,0,12,8Zm0,6a2,2,0,1,1,2-2A2,2,0,0,1,12,14Z"/>
                                                <path class="hidden hide"
                                                      d="M10.94,6.08A6.93,6.93,0,0,1,12,6c3.18,0,6.17,2.29,7.91,6a15.23,15.23,0,0,1-.9,1.64,1,1,0,0,0-.16.55,1,1,0,0,0,1.86.5,15.77,15.77,0,0,0,1.21-2.3,1,1,0,0,0,0-.79C19.9,6.91,16.1,4,12,4a7.77,7.77,0,0,0-1.4.12,1,1,0,1,0,.34,2ZM3.71,2.29A1,1,0,0,0,2.29,3.71L5.39,6.8a14.62,14.62,0,0,0-3.31,4.8,1,1,0,0,0,0,.8C4.1,17.09,7.9,20,12,20a9.26,9.26,0,0,0,5.05-1.54l3.24,3.25a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42Zm6.36,9.19,2.45,2.45A1.81,1.81,0,0,1,12,14a2,2,0,0,1-2-2A1.81,1.81,0,0,1,10.07,11.48ZM12,18c-3.18,0-6.17-2.29-7.9-6A12.09,12.09,0,0,1,6.8,8.21L8.57,10A4,4,0,0,0,14,15.43L15.59,17A7.24,7.24,0,0,1,12,18Z"/>
                                        </svg>
                            </span>
                        </div>
                    </div>
                    <input type="hidden" name="token" value="{{$token}}">
                    <div class="flex flex-1 justify-end mt-10  xl:mt-0">
                        <button
                            class="uppercase hover:text-orange-default hover:bg-white text-center rounded-lg px-4 py-2 mb-3 text-white bg-orange-default font-raleway font-semibold md:text-xl xl:border-2 xl:border-orange-default xl:mb-0 xl:text-center xl:px-10 xl:py-3 xl:rounded-2xl xl:text-2xl 2xl:text-3xl flex-1 xl:flex-initial transition-all"
                            type="submit" dusk="submit-credentials">{{__('login_register.reset_button')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
</body>
</html>
