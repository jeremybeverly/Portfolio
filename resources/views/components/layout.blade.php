<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? "Jeremy's Portofolio" }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
    <style>
        .card {
            background: #706f6c;
            max-width: 200px;
            margin: auto;
            padding: 1rem;
            text-align: center;
        }

        .card .modal-header {
            font-weight: bold;
        }
    </style>
<body class="min-h-screen flex flex-col bg-gray-100 text-gray-800">
    <div class="fixed top-0 left-0 right-0 flex justify-center mt-4">
        <nav class="flex items-center bg-white px-6">
            <div class="flex items-center gap-6 text-sm font-medium text-blue-600">
                <a href="/" class="hover:text-purple-500">Home</a>
                <a href="/about" class="hover:text-purple-500">About Me</a>
                <a href="/projects" class="hover:text-purple-500">My Projects</a>
                <a href="/dashboard" class="hover:text-purple-500">Dashboard</a>
            </div>
        </nav>
    </div>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
