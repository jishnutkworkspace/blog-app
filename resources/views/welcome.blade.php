<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog App</title>
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-white mb-6">Welcome</h2>

        @if (Route::has('login'))
            <div class="flex flex-col space-y-4">
                @auth
                    {{-- Redirect to Posts Index --}}
                    <a href="{{ route('posts.index') }}"
                       class="w-full text-center bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg">
                       Go to Dashboard
                    </a>
                @else
                    {{-- Login Button --}}
                    <a href="{{ route('login') }}"
                       class="w-full text-center bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg">
                       Login
                    </a>

                    {{-- Register Button --}}
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="w-full text-center bg-gray-600 hover:bg-gray-700 text-white py-2 rounded-lg">
                           Register
                        </a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

</body>
</html>
