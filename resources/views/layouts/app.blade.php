<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&display=swap" rel="stylesheet">

    <!-- Styling & scripts -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body x-data="{ minimized:false }" x-cloak class="font-[geist] bg-boxes text-zinc-900 min-h-screen antialiased p-0">
    @include('layouts.navigation')

    <!-- Page Content -->
    <div class="space-y-0" :class="minimized ? 'pl-20' : 'pl-20 md:pl-72'" x-cloak x-transition class="transition-all duration-300 ease-in-out">

        <main class="p-4 md:p-7 min-h-[95vh]">
            <div class="flex flex-col gap-5 bg-white p-5 w-full h-fit border border-zinc-300 rounded-2xl">
                {{ $slot }}
            </div>
        </main>

        <!-- Footer -->
        <footer class="w-full flex items-center justify-start gap-2 divide-x-2 divide-zinc-500 px-7 pb-7">
            <span class="text-zinc-700 text-sm font-medium">
                &copy; {{ date('Y') }} Pendataan siswa. All rights reserved
            </span>

            <span class="text-zinc-700 text-sm font-medium pl-2">
                Project made by <a href="https://github.com/mozarist" target="_blank"
                    class="bg-gradient-to-tr from-zinc-900 to-emerald-600 inline-block bg-clip-text text-transparent hover:underline decoration-emerald-700">Mozarist</a>
            </span>
        </footer>

        </div>

</body>

</html>