<x-app-layout>

    <x-header>
        <h2 class="text-2xl font-medium">Detail data siswa</h2>

        
        <div class="flex items-center justify-start gap-2 md:pt-2">

            <a href="{{ route('siswa.edit', $siswa->id) }}">
                <x-primary-button>Edit data siswa</x-primary-button>
            </a>

            <div x-data="{ open: false }">
                <x-danger-button @click="open = true">Hapus data siswa</x-danger-button>

                <div x-show="open" x-cloak
                    class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm">
                    <div @click.outside="open = false"
                        class="bg-white/90 backdrop-blur-sm max-w-sm w-full p-6 border border-zinc-300 rounded-xl">
                        <p class="text-red-600 mb-4 text-center">Yakin ingin menghapus data siswa ini?
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

    </div>

    <!-- detail kelas -->
    <div class="flex flex-col md:flex-row gap-5 justify-start items-start w-full">
        <div class="flex flex-col gap-4 w-full p-5 rounded-2xl border border-zinc-300">

            <h4 class="text-3xl font-medium leading-none pb-2 border-b border-zinc-300">
                Riwayat ajar
            </h4>

            <div class="flex flex-col divide-y divide-zinc-300">
                @foreach ($kelas_detail as $x)

                    <div class="py-4 space-y-1 rounded-xl">

                        <p class="pt-1 leading-none">
                            Tahun ajar: {{ $x->tahun_ajar->nama_tahun_ajar }}
                        </p>

                        <p class="pt-1 leading-none">
                            Kelas: {{ $x->kelas->nama_kelas }}
                        </p>

                        <p class="pt-1 leading-none">
                            Status: <span class="capitalize
                                        @if ($x->status == 'aktif')
                                            text-green-600
                                        @else
                                            text-red-600
                                        @endif
                                        ">{{ $x->status }}</span>
                        </p>

                    </div>

                @endforeach
            </div>

        </div>

        <form action="{{ route('siswa.naikKelas', $siswa->id) }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col gap-4 w-full p-5 rounded-2xl border border-zinc-300">
            @csrf

            <h4 class="text-3xl font-medium capitalize leading-none pb-2 border-b border-zinc-300">
                Form kenaikan kelas
            </h4>

            <div class="w-full space-y-4">

                <label class="block space-y-1">
                    <x-input-label>Kelas*</x-input-label>
                    <x-select-input name="kelas_id" class="w-full" required>
                        <option value="" disabled selected>Pilih kelas baru</option>
                        @foreach ($kelas as $x)
                            <option value="{{ $x->id }}">{{ $x->nama_kelas }}</option>
                        @endforeach
                    </x-select-input>

                    @error('kelas_id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </label>

                <label class="block space-y-1">
                    <x-input-label>Tahun ajar*</x-input-label>
                    <x-select-input name="tahun_ajar_id" class="w-full" required>
                        <option value="" disabled selected>Pilih tahun ajar baru</option>
                        @foreach ($tahun_ajar as $x)
                            <option value="{{ $x->id }}">{{ $x->nama_tahun_ajar }}</option>
                        @endforeach
                    </x-select-input>

                    @error('tahun_ajar_id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </label>

            </div>

            <div class="flex items-center justify-start gap-2 md:pt-2">
                <x-primary-button>Naik kelas</x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>