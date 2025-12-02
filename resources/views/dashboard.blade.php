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

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 h-fit">
        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    3
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah tahun ajar
                </h4>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    3
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah jurusan
                </h4>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    10
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah kelas
                </h4>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    67
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah siswa
                </h4>
            </div>
        </x-card>
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