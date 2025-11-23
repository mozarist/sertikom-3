<x-app-layout>

<div class="space-y-2 bg-gradient-to-tr from-blue-900 to-zinc-950 w-full h-52 p-5 rounded-xl">
    <h3 class="text-white text-6xl">
        Welcome back!
    </h3>

    <p class="text-zinc-300 text-sm">
        You are logged in as <strong>{{ Auth::user()->name }}</strong>    
    </p>
</div>

</x-app-layout>