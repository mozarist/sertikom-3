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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen p-5 bg-boxes text-zinc-900 font-[Geist] antialiased flex items-center justify-center">

    <div class="max-w-5xl w-full rounded-xl overflow-hidden bg-white border border-zinc-300 shadow-sm z-10">
        <div class="md:flex">
            <!-- left panel -->
            <div class="md:w-1/2 aspect-square overflow-hidden bg-zinc-950 bg-grid-dark text-white p-8 flex flex-col justify-between">
                <div class="space-y-2">
                    <x-application-logo-large-white />

                    <p class="text-sm text-zinc-300 max-w-xs">Bangun manajemen data sekolah yang lebih rapi, otomatis,
                        dan terintegrasi.
                    </p>
                </div>

                {{-- project made by mozarist --}}
                    <span class="text-zinc-300 text-sm font-medium">
                        &copy; {{ date('Y') }} Pendataan siswa. | Project made by <a href="https://github.com/mozarist" target="_blank"
                            class="bg-gradient-to-tr from-zinc-300 to-emerald-600 inline-block bg-clip-text text-transparent hover:underline decoration-emerald-700">Mozarist</a>
                    </span>
            </div>


            <!-- right panel (form) -->
            <div
                class="w-1/2 h-full aspect-square flex flex-col justify-center gap-10 p-8 bg-white overflow-hidden rounded-r-xl">
                <div class="space-y-2">
                    <h2 class="text-3xl font-medium leading-none">
                        Welcome back! 👋
                    </h2>

                    <p class="text-sm text-zinc-700 leading-none">
                        Login untuk masuk ke sistem
                    </p>
                </div>

                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
