<x-app-layout>

    <x-header>

        <h2 class="text-2xl font-medium">Daftar siswa</h2>

        <a href="{{ route('siswa.create') }}">
            <x-primary-button>Tambah siswa</x-primary-button>
        </a>

    </x-header>

    <form method="GET" class="flex flex-col md:flex-row gap-2 w-full">

        <!-- Search -->
        <x-search-bar type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama / NISN..."
            class="w-full md:w-80 h-full" />

        <!-- Filter Jurusan -->
        <div class="flex items-center gap-2 w-full">
            <select name="jurusan" class="px-4 py-2 text-sm border border-zinc-300 rounded-md w-full">
                <option value="">Jurusan</option>
                @foreach ($jurusan as $j)
                    <option value="{{ $j->id }}" {{ request('jurusan') == $j->id ? 'selected' : '' }}>
                        {{ $j->nama_jurusan }}
                    </option>
                @endforeach
            </select>

            <!-- Filter Kelas -->
            <select name="kelas" class="px-4 py-2 text-sm border border-zinc-300 rounded-md w-full">
                <option value="">Kelas</option>
                @foreach ($kelas as $k)
                    <option value="{{ $k->id }}" {{ request('kelas') == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>

            <!-- Filter Tahun Ajar -->
            <select name="tahun_ajar" class="px-4 py-2 text-sm border border-zinc-300 rounded-md w-full">
                <option value="">Tahun ajar</option>
                @foreach ($tahun_ajar as $t)
                    <option value="{{ $t->id }}" {{ request('tahun_ajar') == $t->id ? 'selected' : '' }}>
                        {{ $t->nama_tahun_ajar }}
                    </option>
                @endforeach
            </select>

            <x-secondary-button type="submit" class="h-fit">Filter</x-primary-button>
        </div>

    </form>


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
                    <th class="w-fit p-4 bg-zinc-900 rounded-tr-xl">
                        <p class="block font-light text-sm text-center antialiased leading-none">
                            Aksi
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

                            <td class="flex items-center justify-center gap-2 px-4 py-2">

                                <a href="{{ route('siswa.show', $x->id) }}">
                                    <x-primary-button>Detail</x-primary-button>
                                </a>

                                <div x-data="{ open: false }">
                                    <x-danger-button @click="open = true">Hapus</x-danger-button>

                                    <div x-show="open" x-cloak
                                        class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm">
                                        <div @click.outside="open = false"
                                            class="bg-white/90 backdrop-blur-sm p-6 border border-zinc-300 rounded-xl">
                                            <p class="text-red-600 mb-4 text-center">Yakin ingin menghapus data
                                                {{ $x->nama_lengkap }}?
                                            </p>

                                            <div class="flex items-center justify-center gap-2">
                                                <x-secondary-button class="w-full"
                                                    @click="open = false">Batal</x-secondary-button>

                                                <form action="{{ route('siswa.destroy', $x->id) }}" method="POST"
                                                    class="w-full">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-danger-button class="w-full">Hapus</x-danger-button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif

        </table>
    </div>

    {{ $siswa->appends(request()->query())->links() }}


</x-app-layout>