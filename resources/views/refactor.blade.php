<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LLoadout refactor - {{ $title }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="antialiased">
@include('menu')

<div class="relative py-16 bg-white overflow-hidden">
    <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
        <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
            <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)"/>
            </svg>
            <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)"/>
            </svg>
            <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                <defs>
                    <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor"/>
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)"/>
            </svg>
        </div>
    </div>
    <div class="relative px-4 sm:px-6 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            <h1>
                <span class="block text-base text-3xl text-center text-indigo-600 font-semibold tracking-wide uppercase">{{ $title }}</span>
                <span class="mt-2 block text text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-2xl">{{ $description }}</span>
                <span class="mt-2 block text text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-2xl">
                    @foreach($requires as $requirement)
                    <div class="ml-4 text-xs inline-flex items-center font-bold leading-sm uppercase px-3 py-1 bg-green-200 text-green-700 rounded-full">
                        requires: {{ $requirement }}
                    </div>
                    @endforeach
                </span>
            </h1>
            <p class="mt-8 text-xl text-gray-500 leading-8">{!! $explanation !!}</p>
        </div>
        <div class="max-w-4xl mx-auto mt-10">
            <h2 class="text-indigo-600 text-xl mb-10 font-bold">Original code</h2>
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="mt-2 max-w-xl text-xs text-gray-500">
                        <p>
                            <code class="text-black">
                                {!! $torefactor !!}
                            </code>
                        </p>

                    </div>

                </div>
            </div>
        </div>

        <div class="max-w-4xl mx-auto mt-10">
            <h2 class="text-indigo-600 text-xl mb-10 font-bold">Refactored code</h2>
            <div class="bg-white shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="mt-2 max-w-xl text-xs text-gray-500">
                        <p>
                            <code class="text-black">
                                {!! $refactored !!}
                            </code>
                        </p>
                    </div>

                </div>
            </div>
        </div>

        @if(sizeof($output) > 0)
            <div class="max-w-4xl mx-auto mt-10">
                <h2 class="text-indigo-600 text-xl mb-5 font-bold">Here is the output of the code</h2>
                <div class="bg-white shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:p-6">
                        <div class="mt-2 max-w-xl text-xs text-gray-500">
                            <p>
                                @foreach($output as $outputstring)
                                    {!! $outputstring !!}
                                @endforeach
                            </p>

                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>

    @include('cta')
</div>
</body>
</html>
