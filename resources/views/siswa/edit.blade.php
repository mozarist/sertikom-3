<x-app-layout>

    <x-header>
        <h2 class="text-2xl font-medium">Edit data siswa</h2>

        <x-secondary-button onclick="window.history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor"
                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M569 337C578.4 327.6 578.4 312.4 569 303.1L425 159C418.1 152.1 407.8 150.1 398.8 153.8C389.8 157.5 384 166.3 384 176L384 256L272 256C245.5 256 224 277.5 224 304L224 336C224 362.5 245.5 384 272 384L384 384L384 464C384 473.7 389.8 482.5 398.8 486.2C407.8 489.9 418.1 487.9 425 481L569 337zM224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160z" />
            </svg>

            Kembali
        </x-secondary-button>
    </x-header>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 w-full self-center p-5 rounded-2xl border border-zinc-300">
        @csrf
        @method('PUT')

        <div class="w-full space-y-4">

            <label class="block space-y-1">
                <x-input-label>NISN*</x-input-label>
                <x-text-input name="nisn" value="{{ $siswa->nisn }}" placeholder="Masukkan NISN siswa (10 digit)" class="w-full"></x-text-input>

                @error('nisn')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Nama lengkap*</x-input-label>
                <x-text-input name="nama_lengkap" value="{{ $siswa->nama_lengkap }}" placeholder="Masukkan nama lengkap siswa"
                    class="w-full"></x-text-input>

                @error('nama_lengkap')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Jenis kelamin*</x-input-label>
                <x-select-input name="jenis_kelamin" class="w-full" required>
                    <option value="" disabled>Pilih jenis kelamin siswa</option>

                    <option value="laki-laki" {{ $siswa->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="perempuan" {{ $siswa->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                </x-select-input>

                @error('jenis_kelamin')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Tanggal lahir*</x-input-label>
                <x-text-input type="date" name="tanggal_lahir" class="w-full"></x-text-input>

                @error('tanggal_lahir')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Alamat*</x-input-label>
                <x-textarea-input name="alamat" rows="3" placeholder="Masukkan alamat tempat tinggal siswa"
                    class="w-full">{{ $siswa->alamat }}</x-textarea-input>

                @error('alamat')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Tahun ajar*</x-input-label>
                <x-select-input name="tahun_ajar_id" class="w-full" required>
                    <option value="" disabled>Pilih tahun ajar</option>
                    @foreach ($tahun_ajar as $x)
                        <option value="{{ $x->id }}" {{ $x->id == $siswa->tahun_ajar_id ? 'selected' : '' }}>{{ $x->nama_tahun_ajar }}</option>
                    @endforeach
                </x-select-input>

                @error('jurusan_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Jurusan*</x-input-label>
                <x-select-input name="jurusan_id" class="w-full" required>
                    <option value="" disabled>Pilih jurusan</option>
                    @foreach ($jurusan as $x)
                        <option value="{{ $x->id }}" {{ $x->id == $siswa->jurusan_id ? 'selected' : '' }}>{{ $x->nama_jurusan }}</option>
                    @endforeach
                </x-select-input>

                @error('jurusan_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Kelas*</x-input-label>
                <x-select-input name="kelas_id" class="w-full" required>
                    <option value="" disabled>Pilih kelas</option>
                    @foreach ($kelas as $x)
                        <option value="{{ $x->id }}" {{ $x->id == $siswa->kelas_id ? 'selected' : '' }}>{{ $x->nama_kelas }}</option>
                    @endforeach
                </x-select-input>

                @error('kelas_id')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

        </div>

        <div class="flex items-center justify-start gap-2 md:pt-2">
            <x-primary-button>Edit data siswa</x-primary-button>
        </div>
    </form>

</x-app-layout>