<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Admin Dashboard" }}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-neutral-50 text-neutral-900 font-sans antialiased">
<div class="flex min-h-screen">

    <aside class="w-64 bg-white border-r border-neutral-200/60 flex flex-col hidden md:flex shrink-0 shadow-sm z-10">
        <div class="p-6">
            <h1 class="text-xl font-extrabold text-neutral-950 tracking-tight">Master Page</h1>
        </div>

        <nav class="flex-1 flex flex-col px-4 pb-4 space-y-1.5 overflow-y-auto">
            <a href="/" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-neutral-500 hover:text-neutral-950 hover:bg-neutral-100 transition group">
                &larr;  View Live Site
            </a>



            <a href="{{ route('projects.index') }}"
               class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('projects.*') ? 'bg-neutral-900 text-white shadow-sm' : 'text-neutral-600 hover:text-neutral-950 hover:bg-neutral-100' }}">
                Development Projects
            </a>

            <a href="{{ route('designs.index') }}"
               class="flex items-center px-3 py-2.5 rounded-xl text-sm font-medium transition {{ request()->routeIs('designs.*') ? 'bg-neutral-900 text-white shadow-sm' : 'text-neutral-600 hover:text-neutral-950 hover:bg-neutral-100' }}">
                Creative Designs
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-auto pt-6">
                @csrf
                <button type="submit" class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-red-600 hover:bg-red-50 hover:text-red-700 transition group cursor-pointer text-left">
                    <svg class="w-4 h-4 text-red-500 group-hover:text-red-600 transition" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Sign Out
                </button>
            </form>
        </nav>
    </aside>

    <main class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <div class="flex-1 overflow-y-auto p-4 md:p-8">
            {{ $slot }}
        </div>
    </main>

</div>
</body>
</html>
