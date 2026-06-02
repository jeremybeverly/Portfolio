<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Dashboard" }}</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-neutral-50 text-neutral-900 font-sans">
<div class="grid grid-cols-[260px_1fr] min-h-screen">
    <aside class="flex flex-col gap-2 bg-white p-6 border-r border-neutral-200/60">
        <div class="pt-4 pb-10 text-2xl font-bold text-neutral-950">Portofolio Admin</div>
        <nav class="flex flex-col gap-2">
            <a href="/" class="px-4 py-2 rounded-lg hover:bg-neutral-100 transition text-neutral-700 hover:text-neutral-900">Back to Portfolio</a>
            <a href="{{route('projects.index')}}" class="px-4 py-2 rounded-lg bg-neutral-100 text-neutral-900 font-medium">Manage Projects</a>
        </nav>
    </aside>
    <main class="p-8"> {{$slot}}</main>
</div>
</body>
</html>
