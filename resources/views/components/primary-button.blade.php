<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center px-6 py-2 bg-zinc-950 hover:bg-zinc-900 rounded-md text-base text-white text-center font- transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>