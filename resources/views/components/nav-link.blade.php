@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center gap-2 px-3 py-1 text-base font-medium leading-5 bg-zinc-200/75 text-zinc-900 rounded-md transition duration-150 ease-in-out'
            : 'flex items-center gap-2 px-3 py-1 text-base font-medium leading-5 hover:bg-zinc-100 text-zinc-600 hover:text-zinc-700 focus:outline-none focus:text-zinc-800 focus:underline transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
