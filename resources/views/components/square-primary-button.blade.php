<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center p-3 aspect-square bg-zinc-950 hover:bg-zinc-900 rounded-md text-base text-white text-center transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>