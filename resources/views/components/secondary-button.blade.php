<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-6 py-2 bg-white rounded-md text-sm font-medium text-zinc-950 text-center hover:bg-zinc-100 border border-zinc-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>