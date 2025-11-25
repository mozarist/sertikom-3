<x-app-layout>

    <div class="flex justify-between items-center gap-5 pb-4 border-b border-zinc-300">

        <h2 class="text-2xl font-medium">Daftar Jurusan</h2>

        <a href="{{ route('jurusan.create') }}">
            <x-primary-button>Tambah jurusan</x-primary-button>
        </a>

    </div>

    <div
        class="relative flex flex-col w-full h-full text-gray-700 bg-white border border-zinc-300 rounded-xl overflow-hidden">
        <table class="w-full text-left table-auto">
            <thead>
                <tr class="text-white border-b border-zinc-300">
                    <th class="w-2/5 p-4 bg-zinc-900 rounded-tl-xl">
                        <p class="block font-light text-sm antialiased leading-none">
                            Kode jurusan
                        </p>
                    </th>
                    <th class="w-4/5 p-4 bg-zinc-900">
                        <p class="block font-light text-sm antialiased leading-none">
                            Nama jurusan
                        </p>
                    </th>
                    <th class="w-2/5 p-4 bg-zinc-900 rounded-tr-xl">
                        <p class="block font-light text-sm text-center antialiased leading-none">
                            Aksi
                        </p>
                    </th>
                </tr>
            </thead>
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
                        <td class="flex items-center justify-center gap-2 px-4 py-2">
                            <a href="{{ route('jurusan.edit', $x->id) }}">
                                <x-primary-button>Edit</x-primary-button>
                            </a>

                            <div x-data="{ open: false }">
                                <x-danger-button @click="open = true">Hapus</x-danger-button>

                                <div x-show="open" x-cloak
                                    class="fixed inset-0 flex items-center justify-center bg-black/50 backdrop-blur-sm">
                                    <div @click.outside="open = false"
                                        class="bg-white/90 backdrop-blur-sm p-6 border border-zinc-300 rounded-xl">
                                        <p class="text-red-600 mb-4 text-center">Yakin ingin menghapus jurusan
                                            {{ $x->nama_jurusan }}?</p>

                                        <div class="flex items-center justify-center gap-2">
                                            <x-secondary-button class="w-full"
                                                @click="open = false">Batal</x-secondary-button>

                                            <form action="{{ route('jurusan.destroy', $x->id) }}" method="POST"
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
        </table>
    </div>

    {{ $jurusan->links() }}

</x-app-layout>
