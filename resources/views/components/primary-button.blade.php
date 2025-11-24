<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center gap-3 px-6 py-2 bg-zinc-950 hover:bg-zinc-900 rounded-md text-sm font-medium text-white text-center transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>