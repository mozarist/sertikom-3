<x-app-layout>

    <x-header>

        <h2 class="text-2xl font-medium">Daftar user</h2>

        <a href="{{ route('users.create') }}">
            <x-primary-button>Tambah user</x-primary-button>
        </a>

    </x-header>

    <div class="space-y-2">
        <div class="flex justify-between items-center gap-5">
            <h3 class="text-zinc-700 text-sm font-medium leading-none">
                Role: Master
            </h3>

            <p class="text-zinc-700 text-sm font-medium leading-none">
                Total: {{ $master->count() }}
            </p>
        </div>

        @if ($master->isEmpty())
            <div class="w-full text-zinc-700 text-sm font-medium p-5 border border-zinc-300 border-dashed rounded-xl">
                <p>
                    Belum ada user dengan role ini
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5 w-full">
                @foreach ($master as $x)

                    <x-card>

                        <div class="space-y-1">
                            <h4 class="text-2xl font-medium leading-none">
                                {{ $x->name }}
                            </h4>
                            <p class="text-sm font-light text-zinc-700 leading-none">
                                Email: {{ $x->email }}
                            </p>
                        </div>

                        <div class="flex justify-between items-end gap-4">
                            <p class="bg-gradient-to-tr from-zinc-900 to-emerald-800 bg-clip-text w-fit text-transparent capitalize leading-none">
                                {{ $x->role }}
                            </p>

                            <a href="{{ route('users.edit', $x->id) }}">
                                <x-secondary-button class="w-fit relative -bottom-2 -right-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-4"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                    </svg>
                                </x-secondary-button>
                            </a>
                        </div>

                    </x-card>

                @endforeach
            </div>
        @endif
    </div>

    <div class="space-y-2 pt-4 border-t border-zinc-300">
        <div class="flex justify-between items-center gap-5">
            <h3 class="text-zinc-700 text-sm font-medium leading-none">
                Role: Admin
            </h3>

            <p class="text-zinc-700 text-sm font-medium leading-none">
                Total: {{ $admin->count() }}
            </p>
        </div>

        @if ($admin->isEmpty())
            <div class="w-full text-zinc-700 text-sm font-medium p-5 border border-zinc-300 border-dashed rounded-xl">
                <p>
                    Belum ada user dengan role ini
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5 w-full">
                @foreach ($admin as $x)

                    <x-card>

                        <div class="space-y-1">
                            <h4 class="text-2xl font-medium leading-none">
                                {{ $x->name }}
                            </h4>
                            <p class="text-sm font-light text-zinc-700 leading-none">
                                Email: {{ $x->email }}
                            </p>
                        </div>

                        <div class="flex justify-between items-end gap-4">
                            <p class="bg-gradient-to-tr from-zinc-900 to-emerald-800 bg-clip-text w-fit text-transparent capitalize leading-none">
                                {{ $x->role }}
                            </p>

                            <a href="{{ route('users.edit', $x->id) }}">
                                <x-secondary-button class="w-fit relative -bottom-2 -right-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-4"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                    </svg>
                                </x-secondary-button>
                            </a>
                        </div>

                    </x-card>

                @endforeach
            </div>
        @endif
    </div>

    <div class="space-y-2 pt-4 border-t border-zinc-300">
        <div class="flex justify-between items-center gap-5">
            <h3 class="text-zinc-700 text-sm font-medium leading-none">
                Role: Guru
            </h3>

            <p class="text-zinc-700 text-sm font-medium leading-none">
                Total: {{ $guru->count() }}
            </p>
        </div>

        @if ($guru->isEmpty())
            <div class="w-full text-zinc-700 text-sm font-medium p-5 border border-zinc-300 border-dashed rounded-xl">
                <p>
                    Belum ada user dengan role ini
                </p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-5 w-full">
                @foreach ($guru as $x)

                    <x-card>

                        <div class="space-y-1">
                            <h4 class="text-2xl font-medium leading-none">
                                {{ $x->name }}
                            </h4>
                            <p class="text-sm font-light text-zinc-700 leading-none">
                                Email: {{ $x->email }}
                            </p>
                        </div>

                        <div class="flex justify-between items-end gap-4">
                            <p class="bg-gradient-to-tr from-zinc-900 to-emerald-800 bg-clip-text w-fit text-transparent capitalize leading-none">
                                {{ $x->role }}
                            </p>

                            <a href="{{ route('users.edit', $x->id) }}">
                                <x-secondary-button class="w-fit relative -bottom-2 -right-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="size-4"
                                        viewBox="0 0 512 512"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                        <path
                                            d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152L0 424c0 48.6 39.4 88 88 88l272 0c48.6 0 88-39.4 88-88l0-112c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 112c0 22.1-17.9 40-40 40L88 464c-22.1 0-40-17.9-40-40l0-272c0-22.1 17.9-40 40-40l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24L88 64z" />
                                    </svg>
                                </x-secondary-button>
                            </a>
                        </div>

                    </x-card>

                @endforeach
            </div>
        @endif
    </div>

    {{ $users->links() }}

</x-app-layout>