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
                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/php8-match?status=2">Refactor to Match</a><br /></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        The match expression branches evaluation based on an identity check of a value. ( php8 )
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/php8-arrow-functions">Using Arrow functions</a></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        Arrow functions were introduced in PHP 7.4 as a more concise syntax for anonymous functions.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/null-operators">Null coalescence operator</a></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        The null coalescing operator (??) has been added as syntactic sugar for the common case of needing to use a ternary in conjunction with isset().
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/null-operators">Null assignment operator</a></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        The Null Coalesce Assignment Operator (??=) assigns the value of the right-hand parameter if the left-hand parameter is null.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/using-constants?status=2">Refactor to using constants</a></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        Using constants is much more self-explanatory than using numbers.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/php8-property-promotion">Refactor to property promotion</a></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        Using constants is much more self-explanatory than using numbers.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/laravel-optional-helper">Laravel optional helper</a></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        Using the optional helper from Laravel , you will get much cleaner and readable code
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <!-- Heroicon name: outline/check -->
                        <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="ml-9 text-lg leading-6 font-medium text-gray-900"><a href="/refactor/php-dry">Coding style , don't repeat yourself</a></p>
                    </dt>
                    <dd class="mt-2 ml-9 text-base text-gray-500">
                        Sometimes i find myself repeating code , most of the time when business logic changes and we start implementing if statements.
                    </dd>
                </div>


            </dl>
        </div>
    </div>

@include('cta')
    </body>
</html>
