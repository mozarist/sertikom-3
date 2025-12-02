<x-app-layout>

    <div class="flex flex-col gap-12 bg-grid-dark w-full min-h-52 p-5 rounded-2xl">
        <div class="space-y-2">
            <h3 class="text-white text-6xl">
                Selamat kembali!
            </h3>

            <p class="text-zinc-100 text-sm">
                Semoga harimu menyenangkan. Berikut ringkasan data untukmu hari ini.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 h-fit">
        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    {{ $tahun_ajar->count() }}
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah tahun ajar
                </h4>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    {{ $jurusan->count() }}
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah jurusan
                </h4>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    {{ $kelas->count() }}
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah kelas
                </h4>
            </div>
        </x-card>

        <x-card>
            <div class="space-y-2">
                <span class="text-5xl font-normal leading-none">
                    {{ $siswa->count() }}
                </span>

                <h4 class="text-base font-normal leading-none">
                    Jumlah siswa
                </h4>
            </div>
        </x-card>
    </div>


    <div class="flex flex-col md:flex-row gap-5 w-full">
        <div class="flex flex-col gap-2 w-full h-fit bg-white w-3/5 p-2 border border-zinc-300 rounded-xl">
            <h4 class="text-zinc-700 text-sm font-medium leading-none p-2 border-b border-zinc-300">
                Aksi cepat
            </h4>

            <div class="flex flex-col items-center gap-1">
                <a href="{{ route('siswa.create') }}"
                    class="w-full bg-zinc-100 hover:bg-zinc-200/75 text-zinc-700 px-2 py-1 rounded-md hover:text-zinc-900 underline">
                    Tambah data siswa
                </a>

                <a href="{{ route('tahun_ajar.create') }}"
                    class="w-full bg-zinc-100 hover:bg-zinc-200/75 text-zinc-700 px-2 py-1 rounded-md hover:text-zinc-900 underline">
                    Tambah data tahun ajar
                </a>

                <a href="{{ route('jurusan.create') }}"
                    class="w-full bg-zinc-100 hover:bg-zinc-200/75 text-zinc-700 px-2 py-1 rounded-md hover:text-zinc-900 underline">
                    Tambah data jurusan
                </a>

                <a href="{{ route('kelas.create') }}"
                    class="w-full bg-zinc-100 hover:bg-zinc-200/75 text-zinc-700 px-2 py-1 rounded-md hover:text-zinc-900 underline">
                    Tambah data kelas
                </a>
            </div>
        </div>

        <div class="w-full flex flex-col gap-4 bg-white p-5 border border-zinc-300 rounded-xl">

            <div class="flex justify-between items-center">
                <h4 class="text-sm font-medium leading-none">
                    Daftar tahun ajar
                </h4>

                <a href="{{ route('tahun_ajar.index') }}" class="text-zinc-700 text-sm hover:underline">
                    Lihat lebih detail
                </a>
            </div>

            <div
                class="flex-2 relative flex flex-col justify-between w-full h-full overflow-y-auto text-gray-700 bg-white border border-zinc-300 rounded-xl overflow-hidden">
                <table class="w-full text-left table-auto">
                    <thead>
                        <tr class="text-white border-b border-zinc-300">
                            <th class="w-3/5 px-4 py-3 bg-zinc-900 rounded-tl-xl">
                                <p class="block font-light text-sm antialiased leading-none">
                                    Kode tahun ajar
                                </p>
                            </th>
                            <th class="w-full text-left px-4 py-3 bg-zinc-900">
                                <p class="block font-light text-sm antialiased leading-none">
                                    Tahun ajar
                                </p>
                            </th>
                        </tr>
                    </thead>

                    @if ($tahun_ajar->isEmpty())
                        <tbody>
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-start">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-zinc-500">
                                        Tidak ada data tahun ajar tersedia.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    @else
                        <tbody>
                            @foreach ($tahun_ajar as $x)
                                <tr class="border-b border-zinc-300">
                                    <td class="px-4 py-2">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                            {{ $x->kode_tahun_ajar }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                            {{ $x->nama_tahun_ajar }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    @endif

                </table>
            </div>
        </div>

        <div class="w-full flex flex-col gap-4 bg-white p-5 border border-zinc-300 rounded-xl">

            <div class="flex justify-between items-center">
                <h4 class="text-sm font-medium leading-none">
                    Daftar jurusan
                </h4>

                <a href="{{ route('siswa.index') }}" class="text-zinc-700 text-sm hover:underline">
                    Lihat lebih detail
                </a>
            </div>
            <div
                class="flex-2 relative flex flex-col justify-between w-full h-full overflow-y-auto text-gray-700 bg-white border border-zinc-300 rounded-xl overflow-hidden">
                <table class="w-full text-left table-auto">
                    <thead>
                        <tr class="text-white border-b border-zinc-300">
                            <th class="w-1/2 px-4 py-3 bg-zinc-900 rounded-tl-xl">
                                <p class="block font-light text-sm antialiased leading-none">
                                    Kode jurusan
                                </p>
                            </th>
                            <th class="w-full px-4 py-3 bg-zinc-900">
                                <p class="block font-light text-sm antialiased leading-none">
                                    Nama jurusan
                                </p>
                            </th>
                        </tr>
                    </thead>

                    @if ($jurusan->isEmpty())
                        <tbody>
                            <tr>
                                <td colspan="3" class="px-4 py-6 text-start">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-zinc-500">
                                        Tidak ada data jurusan tersedia.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    @else
                        <tbody>
                            @foreach ($jurusan as $x)
                                <tr class="border-b border-zinc-300">
                                    <td class="px-4 py-2">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                            {{ $x->kode_jurusan }}
                                        </p>
                                    </td>
                                    <td class="px-4 py-2">
                                        <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                            {{ $x->nama_jurusan }}
                                        </p>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

    <div class="flex flex-col gap-4 bg-white p-5 border border-zinc-300 rounded-xl">

        <div class="flex justify-between items-center">
            <h4 class="text-sm font-medium leading-none">
                Daftar siswa
            </h4>

            <a href="{{ route('siswa.index') }}" class="text-zinc-700 text-sm hover:underline">
                Lihat lebih detail
            </a>
        </div>

        <div
            class="relative flex flex-col w-full h-full text-gray-700 bg-white border border-zinc-300 rounded-xl overflow-x-auto">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr class="text-white border-b border-zinc-300">
                        <th class="w-fit p-4 bg-zinc-900 rounded-tl-xl">
                            <p class="block font-light text-sm antialiased leading-none">
                                NISN
                            </p>
                        </th>
                        <th class="w-fit p-4 bg-zinc-900">
                            <p class="block font-light text-sm antialiased leading-none">
                                Nama
                            </p>
                        </th>
                        <th class="w-fit p-4 bg-zinc-900">
                            <p class="block font-light text-sm antialiased leading-none">
                                Jenis kelamin
                            </p>
                        </th>
                        <th class="w-fit p-4 bg-zinc-900">
                            <p class="block font-light text-sm antialiased leading-none">
                                Tahun ajar
                            </p>
                        </th>
                        <th class="w-fit p-4 bg-zinc-900">
                            <p class="block font-light text-sm antialiased leading-none">
                                Jurusan
                            </p>
                        </th>
                        <th class="w-fit p-4 bg-zinc-900">
                            <p class="block font-light text-sm antialiased leading-none">
                                Kelas
                            </p>
                        </th>
                    </tr>
                </thead>

                @if ($siswa->isEmpty())
                    <tbody>
                        <tr>
                            <td colspan="3" class="px-4 py-6 text-start">
                                <p class="block font-sans text-sm antialiased font-normal leading-normal text-zinc-500">
                                    Tidak ada data siswa tersedia.
                                </p>
                            </td>
                        </tr>
                    </tbody>
                @else
                    <tbody>
                        @foreach ($siswa as $x)
                            <tr class="border-b border-zinc-300">
                                <td class="px-4 py-2">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                        {{ $x->nisn }}
                                    </p>
                                </td>

                                <td class="px-4 py-2">
                                    <p class="block font-sans capitalize text-sm antialiased font-normal leading-normal">
                                        {{ $x->nama_lengkap }}
                                    </p>
                                </td>

                                <td class="px-4 py-2">
                                    <p class="block font-sans capitalize text-sm antialiased font-normal leading-normal">
                                        {{ $x->jenis_kelamin }}
                                    </p>
                                </td>

                                <td class="px-4 py-2">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                        {{ $x->tahun_ajar->nama_tahun_ajar }}
                                    </p>
                                </td>

                                <td class="px-4 py-2">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                        {{ $x->jurusan->nama_jurusan }}
                                    </p>
                                </td>

                                <td class="px-4 py-2">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal">
                                        {{ $x->kelas->nama_kelas }}
                                    </p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif

            </table>
        </div>
    </div>

</x-app-layout>