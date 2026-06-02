<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Jeremy's Portofolio" }}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-neutral-50 text-neutral-900 font-sans ">
    <div class="flex flex-col min-h-screen">
        <header class="sticky top-0 z-50 bg-white/80 border-b border-b-neutral-200/60 backdrop-blur-md">
            <div class="max-w-5xl mx-auto h-14 px-6 flex justify-between items-center text-sm font-medium">
                <div class="w-24"></div>
                <nav class="flex gap-8 items-center text-neutral-500">
                    <a href="/" class="hover:text-neutral-950 transition-colors duration-200">Home</a>
                    <a href="/about" class="hover:text-neutral-950 transition-colors duration-200">About Me</a>
                    <a href="{{ route('portfolio.projects') }}" class="hover:text-neutral-950 transition-colors duration-200">My Projects</a>
                </nav>
                <div class="w-24 flex justify-end">
                    <a href="{{ route('projects.index') }}"
                       class="bg-neutral-900 hover:bg-neutral-800 text-white text-xs px-3 py-1.5 rounded-full transition-colors duration-200 shadow-sm font-normal tracking-wide">
                        Dashboard
                    </a>
                </div>
            </div>
        </header>
        <main class="flex-grow flex flex-col">
            {{ $slot }}
        </main>
        <div class="bg-gray-700 mt-6 p-6">tes</div>
    </div>
</body>
</html>
