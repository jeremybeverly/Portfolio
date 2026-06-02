<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Jeremy's Portofolio" }}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-neutral-50 text-neutral-900 font-sans">
<div class="flex flex-col min-h-screen">

    <header class="sticky top-0 z-50 bg-white/80 border-b border-b-neutral-200/60 backdrop-blur-md">
        <div class="max-w-5xl mx-auto h-14 px-6 flex justify-between items-center text-sm font-medium">
            <div class="w-24"></div>
            <nav class="flex gap-8 items-center text-neutral-500">
                <a href="/" class="hover:text-neutral-950 transition-colors duration-200">Home</a>
                <a href="{{ route('portfolio.projects') }}" class="hover:text-neutral-950 transition-colors duration-200">My Projects</a>
                <a href="{{ route('portfolio.designs') }}" class="hover:text-neutral-950 transition-colors duration-200">Other Works</a>
            </nav>
            <div class="w-24 flex justify-end">
                @auth
                <a href="{{ route('projects.index') }}"
                   class="bg-neutral-900 hover:bg-neutral-800 text-white text-xs px-3 py-1.5 rounded-full transition-colors duration-200 shadow-sm font-normal tracking-wide">
                    Dashboard
                </a>
                @endauth
                    @guest
                        <a href="{{ route('login') }}"
                           class="bg-white border border-neutral-200 text-neutral-900 hover:bg-neutral-50 text-xs px-3 py-1.5 rounded-full transition-colors duration-200 shadow-sm font-medium tracking-wide">
                            Sign In
                        </a>
                    @endguest
            </div>
        </div>
    </header>

    <main class="flex-grow flex flex-col">
        {{ $slot }}
    </main>

    <footer class="bg-neutral-50 border-t border-neutral-200/60 pt-8 pb-12 mt-12">
        <div class="max-w-5xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center md:items-start gap-4 text-xs text-neutral-500">

            <p>Copyright &copy; {{ date('Y') }} Jeremy Beverly. All rights reserved.</p>

            <div class="flex gap-6 font-medium">
                <a href="#" class="hover:text-neutral-900 transition-colors duration-200">GitHub</a>
                <div class="w-px h-3 bg-neutral-300 self-center hidden md:block"></div>
                <a href="#" class="hover:text-neutral-900 transition-colors duration-200">LinkedIn</a>
                <div class="w-px h-3 bg-neutral-300 self-center hidden md:block"></div>
                <a href="mailto:your.email@example.com" class="hover:text-neutral-900 transition-colors duration-200">Contact</a>
            </div>

        </div>
    </footer>

</div>
<script>
    lucide.createIcons();
</script>
</body>
</html>
