<img src="@if (Auth::user()->profile === true) @else
                https://upload.wikimedia.org/wikipedia/commons/7/7c/Profile_avatar_placeholder_large.png?20150327203541 @endif"
{{ $attributes->merge(['class' => 'bg-zinc-100 min-w-9 object-cover object-center aspect-square border border-zinc-300 rounded-full']) }}>
