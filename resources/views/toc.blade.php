<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LLoadout refactor</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    </head>
    <body class="antialiased">
    @include('menu')
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-extrabold text-gray-900"><img class="mx-auto" src="https://raw.githubusercontent.com/LLoadout/assets/master/LLoadout_refactor.png"></h2>
                <p class="mt-4 text-lg text-2xl text-gray-500">LLoadout refactor shows you code refactorings from real life projects. These refactors are mostly suggested refactors in pull requests</p>
            </div>
            <dl class="mt-12 space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:gap-y-12 lg:grid-cols-4 lg:gap-x-8">

                @foreach($refactors as $refactor)
                <div class="relative">
                    <dt>
                        <img class="absolute h-6 w-6 text-green-500" src="{{ $refactor->icon }}">
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/{{ $refactor->url }}">{{ $refactor->title }}</a><br /></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        {{ $refactor->description }}
                    </dd>
                </div>
                @endforeach

            </dl>
        </div>
        <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8">
            <div class="max-w-3xl mx-auto text-center">
                <p class="mt-4 text-lg text-2xl text-gray-500">This repo is open sourced and works with some magic under the hood.  The example on the left is automagically created from the code on the right.</p>
            </div>
            <img class="object-cover bg-white object-center rounded-3xl shadow-2xl mt-20" src="{{ asset('img/example.png') }}" />
        </div>
    </div>

    <div class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:py-24 lg:px-8">
                <div class="max-w-3xl mx-auto text-center">
                    <p class="mt-4 text-lg text-2xl text-gray-500">This project is sponsored by</p>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
                <div class="col-span-1 flex justify-center md:col-span-6 lg:col-span-6">
                    <a href="https://www.deltasolutions.be"><img class="h-12" src="https://www.deltasolutions.be/wp-content/themes/deltasolutions/images/logo.png" alt="Delta Solutions"></a>
                </div>

            </div>
        </div>
    </div>
@include('cta')
    </body>
</html>
