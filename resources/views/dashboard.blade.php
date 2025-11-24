<x-app-layout>

    <div class="flex flex-col gap-12 bg-grid-dark w-full h-fit p-5 rounded-2xl">
        <div class="space-y-2">
            <h3 class="text-white text-6xl">
                Selamat kembali!
            </h3>

            <p class="text-zinc-100 text-sm">
                Semoga harimu menyenangkan. Berikut ringkasan data untukmu hari ini.
            </p>
        </div>

        <div class="flex gap-2 items-center">
            <x-search-bar>Cari data</x-search-bar>
        </div>
    </div>

    {{-- finish later.. --}}

    <div class="grid grid-cols-3 gap-5 h-44">
        <div class="bg-zinc-100 w-full h-full rounded-2xl">
            {{-- skeleton --}}
        </div>
        <div class="bg-zinc-100 w-full h-full rounded-2xl">
            {{-- skeleton --}}
        </div>
        <div class="bg-zinc-100 w-full h-full rounded-2xl">
            {{-- skeleton --}}
        </div>
    </div>

    <div class="flex gap-5">
        <div class="bg-zinc-100 w-full h-72 rounded-2xl">
            {{-- skeleton --}}
        </div>
        <div class="bg-zinc-100 w-full h-72 rounded-2xl">
            {{-- skeleton --}}
        </div>
    </div>

    <div class="bg-zinc-100 w-full h-52 rounded-2xl">
        {{-- skeleton --}}
    </div>

    <div class="bg-zinc-100 w-full h-[600px] rounded-2xl">
        {{-- skeleton --}}
    </div>

</x-app-layout>
