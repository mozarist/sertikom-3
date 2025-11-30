@props(['disabled' => false])

<textarea @disabled($disabled) {{ $attributes->merge(['class' => 'border-zinc-300 focus:border-zinc-400 focus:outline-none focus:ring-zinc-600 rounded-md shadow-sm']) }}>{{ $slot }}</textarea>