<x-app-layout>

    <x-header>

        <h2 class="text-2xl font-medium">Edit jurusan {{ $jurusan->nama_jurusan }}</h2>

        <x-secondary-button onclick="window.history.back()">
            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="currentColor"
                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path
                    d="M569 337C578.4 327.6 578.4 312.4 569 303.1L425 159C418.1 152.1 407.8 150.1 398.8 153.8C389.8 157.5 384 166.3 384 176L384 256L272 256C245.5 256 224 277.5 224 304L224 336C224 362.5 245.5 384 272 384L384 384L384 464C384 473.7 389.8 482.5 398.8 486.2C407.8 489.9 418.1 487.9 425 481L569 337zM224 160C241.7 160 256 145.7 256 128C256 110.3 241.7 96 224 96L160 96C107 96 64 139 64 192L64 448C64 501 107 544 160 544L224 544C241.7 544 256 529.7 256 512C256 494.3 241.7 480 224 480L160 480C142.3 480 128 465.7 128 448L128 192C128 174.3 142.3 160 160 160L224 160z" />
            </svg>

            Kembali
        </x-secondary-button>

    </x-header>

    <form action="{{ route('jurusan.update', $jurusan->id) }}" method="POST" enctype="multipart/form-data"
        class="space-y-4 w-full self-center p-5 rounded-2xl border border-zinc-300">
        @csrf
        @method('PUT')

        <div class="w-full space-y-4">
            <label class="block space-y-1">
                <x-input-label>Kode jurusan*</x-input-label>
                <x-text-input type="number" min="1" name="kode_jurusan" value="{{ $jurusan->kode_jurusan }}"
                    placeholder="Masukkan kode jurusan" class="w-full"></x-text-input>

                @error('kode_jurusan')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>

            <label class="block space-y-1">
                <x-input-label>Nama jurusan*</x-input-label>
                <x-text-input name="nama_jurusan" placeholder="Masukkan nama jurusan" value="{{ $jurusan->nama_jurusan }}"
                    class="w-full"></x-text-input>

                @error('nama_jurusan')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </label>


        </div>

        <div class="flex items-center justify-start gap-2 md:pt-2">
            <x-primary-button>Edit jurusan</x-primary-button>
        </div>
    </form>

</x-app-layout>