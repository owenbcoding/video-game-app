<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Video-Game-App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-900 text-white">
    <header class="border-b border-gray-800">
        <nav class="container mx-auto flex items-center px-4 py-6">
            <div class="flex items-center">
                <a href="{{ route('index') }}">
                    <p class="w-32 flex-none">Video-Game-App</p>
                </a>
            </div>
            <ul class="flex">
                <li><a href="/games" class="hover:text-gray-400 m-5">Games</a></li>
                <li><a href="/games" class="hover:text-gray-400 m-5">Reviews</a></li>
                <li><a href="/games" class="hover:text-gray-400 m-5">Comming Soon</a></li>
            </ul>
        </nav>
    </header>
    <main>
            {{ $slot }}
    </main>
</body>

</html>
