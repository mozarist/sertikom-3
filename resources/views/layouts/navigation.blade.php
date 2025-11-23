<nav class="flex flex-col justify-between bg-white border-r border-zinc-300 top-0 fixed z-1 w-72 p-5 h-full">

    <div class="space-y-8">
        <x-application-logo />

        <ul class="space-y-4">

        </ul>
    </div>

    <div class="flex justify-between gap-2 p-2 w-full h-fit border border-zinc-300 rounded-md">
        <div class="flex flex-col">
            <strong class="font-medium">{{ Auth::user()->name }}</strong>
            <span class="text-sm leading-none">{{ Auth::user()->role }}</span>
        </div>

        <x-primary-button>
            Logout
        </x-primary-button>
    </div>

</nav>