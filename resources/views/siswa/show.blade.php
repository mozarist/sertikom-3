<x-app-layout>

    <x-header>
        <h2 class="text-2xl font-medium">Detail data siswa</h2>

        <x-secondary-button onclick="window.history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor"
                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M569 337C578.4 327.6 578.4 312.4 569 303.1L425 159C418.1 152.1 407.8 150.1 398.8 153.8C389.8 157.5 384 166.3 384 176L384 256L272 256C245.5 256 224 277.5 224 304L224 336C224 362.5 245.5 384 272 384L384 384L384 464C384 473.7 389.8 482.5 398.8 486.2C407.8 489.9 418.1 487.9 425 481L569 337zM224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160z" />
            </svg>

            Kembali
        </x-secondary-button>
    </x-header>

    <div class="flex flex-col gap-4 w-full self-center p-5 rounded-2xl border border-zinc-300">

        <h4 class="text-3xl font-medium capitalize leading-none pb-2 border-b border-zinc-300">
            {{ $siswa->nama_lengkap }}
        </h4>

        <p class="text-sm text-zinc-700">
            NISN: {{ $siswa->nisn }}
        </p>

        <div class="space-y-1 divide-y divide-zinc-300">
            <p>
                Jenis kelamin: <span class="capitalize">{{ $siswa->jenis_kelamin }}</span>
            </p>

            <p class="pt-1">
                Tanggal lahir: {{ $siswa->tanggal_lahir->translatedFormat('d F Y') }}
            </p>

            <p class="pt-1">
                Alamat: {{ $siswa->alamat }}
            </p>

            <p class="pt-1">
                Tahun ajar: {{ $siswa->tahun_ajar->nama_tahun_ajar }}
            </p>

            <p class="pt-1">
                Jurusan: {{ $siswa->jurusan->nama_jurusan }}
            </p>

            <p class="pt-1">
                Kelas: {{ $siswa->kelas->nama_kelas }}
            </p>

        </div>

        <div class="flex items-center justify-start gap-2 md:pt-2">

            <a href="{{ route('siswa.edit', $siswa->id) }}">
                <x-primary-button>Edit data ini</x-primary-button>
            </a>

            <div x-data="{ open: false }">
                <x-danger-button @click="open = true">Hapus data ini</x-danger-button>

                <div x-show="open" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm">
                    <div @click.outside="open = false"
                        class="bg-white/90 backdrop-blur-sm p-6 border border-zinc-300 rounded-xl">
                        <p class="text-red-600 mb-4 text-center">Yakin ingin menghapus data
                            {{ $siswa->nama_lengkap }}?
                        </p>

                        <div class="flex items-center justify-center gap-2">
                            <x-secondary-button class="w-full" @click="open = false">Batal</x-secondary-button>

                            <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" class="w-full">
                                @csrf
                                @method('DELETE')
                                <x-danger-button class="w-full">Hapus</x-danger-button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</x-app-layout>